<?php
/**
 * PLugin control
 *
 * Allows admins to specify plugins that are loaded on particular pages / CPTs
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Controls the rules by which plugins are manipulated
 *
 * @param array $plugins List of active plugins
 * @return array Modified list of active plugins
 */

function lwp_plugin_control($plugins)
{
    $lwp_controlled_plugins = wp_cache_get('lwp_controlled_plugins', 'plugins');
    if ($lwp_controlled_plugins !== false) {
        return $lwp_controlled_plugins;
    }
    wp_cache_set('lwp_original_plugins', $plugins, 'plugins');

    // Enable plugins on certain URLs
    $enabling_rules = array(
        'flow-flow/flow-flow.php' => array(
            '/social-feeds/'
        )
    );
    // Disable plugins on certain URLs
    $disabling_rules = array(
        'flow-flow.php' => array(
            '/testing-flowflow/'
        )
    );

    // Run enables
    $plugins = array_unique(
        array_merge($plugins, lwp_plugins_affected_by($enabling_rules))
    );

    // Run disables
    $plugins = array_diff($plugins, lwp_plugins_affected_by($disabling_rules));

    wp_cache_set('lwp_controlled_plugins', $plugins, 'plugins');
    return $plugins;
}
add_filter('option_active_plugins', 'lwp_plugin_control');

/**
 * Scan for affected plugins to manipulate
 *
 * @param array $rules Plugin files paired with URL rules
 * @return array Affected plugins by their dir + file name
 */
function lwp_plugins_affected_by($rules)
{
    $affected = array();
    $current_path = add_query_arg(array());
    foreach ($rules as $plugin => $paths) {
        // If any of the paths match the current path
        $matches = array_filter(
            $paths,
            function ($path) use ($current_path) {
                return (
                    $path === $current_path ||
                    preg_match('%'.$path.'%', $current_path)
                );
            }
        );
        if (empty($matches)) {
            continue;
        }
        $affected[] = $plugin;
        add_filter('plugin_action_links_'.$plugin, 'lwp_add_action_links');
    }
    return $affected;
}

/**
 * Show a red message if a plugin is affected by the MU plugin
 * It explains why it's not possible to change it by hand
 *
 * @param array $links Links in the plugin row, like "Activate"
 * @return array Changed links to show in the plugin row
 */
function lwp_add_action_links($links)
{
    unset($links['activate'], $links['deactivate']);
    array_unshift($links, '<span style="color:red;">Controlled by MU!</span>');
    return $links;
}