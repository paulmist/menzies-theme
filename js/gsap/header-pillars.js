document.addEventListener("DOMContentLoaded", () => {
  // Desktop Animation
  const desktopSvg = document.querySelector(".home-header-graphic-desktop svg");
  if (desktopSvg) {
    const svgHeight = desktopSvg.viewBox.baseVal.height || desktopSvg.getBoundingClientRect().height;

    const desktopClips = [
      { selector: '#clippath rect', height: 0.68, y: 0.32 },
      { selector: '#clippath-1 rect', height: 0.95, y: 0.061 },
      { selector: '#clippath-2 rect', height: 0.85, y: 0.15 },
      { selector: '#clippath-3 rect', height: 1, y: 0 },
    ];

    const tlDesktop = gsap.timeline();

    desktopClips.forEach((clip) => {
      const h = svgHeight * clip.height;
      const y = svgHeight * (clip.y + clip.height);
      gsap.set(clip.selector, {
        attr: { height: 0, y: y },
      });
    });

    desktopClips.forEach((clip, i) => {
      const h = svgHeight * clip.height;
      const y = svgHeight * clip.y;
      tlDesktop.to(
        clip.selector,
        {
          attr: { height: h, y: y },
          duration: 1,
          ease: 'power2.out',
        },
        i === 0 ? 0 : '-=0.7'
      );
    });
  }

  // Mobile Animation
  const mobileSvg = document.querySelector(".home-header-graphic-mobile svg");
  if (mobileSvg) {
    const svgHeight = mobileSvg.viewBox.baseVal.height || mobileSvg.getBoundingClientRect().height;

    const mobileClips = [
      { selector: '#clippath-mobile rect', height: 0.7, y: 0.3 },
      { selector: '#clippath-mobile-1 rect', height: 0.95, y: 0.05 },
      { selector: '#clippath-mobile-2 rect', height: 0.9, y: 0.1 },
      { selector: '#clippath-mobile-3 rect', height: 1, y: 0 },
    ];

    const tlMobile = gsap.timeline();

    mobileClips.forEach((clip) => {
      const h = svgHeight * clip.height;
      const y = svgHeight * (clip.y + clip.height);
      gsap.set(clip.selector, {
        attr: { height: 0, y: y },
      });
    });

    mobileClips.forEach((clip, i) => {
      const h = svgHeight * clip.height;
      const y = svgHeight * clip.y;
      tlMobile.to(
        clip.selector,
        {
          attr: { height: h, y: y },
          duration: 1,
          ease: 'power2.out',
        },
        i === 0 ? 0 : '-=0.7'
      );
    });
  }

  // Smallest (1240–1399px) Animation
  const smallestSvg = document.querySelector(".home-header-graphic-smallest svg");
  if (smallestSvg) {
    const svgHeight = smallestSvg.viewBox.baseVal.height || smallestSvg.getBoundingClientRect().height;

    const smallestClips = [
      { selector: '#clippath-small rect', height: 0.7, y: 0.3 },
      { selector: '#clippath-small-1 rect', height: 0.95, y: 0.05 },
      { selector: '#clippath-small-2 rect', height: 0.91, y: 0.09 },
      { selector: '#clippath-small-3 rect', height: 1, y: 0 },
    ];

    const tlSmallest = gsap.timeline();

    smallestClips.forEach((clip) => {
      const h = svgHeight * clip.height;
      const y = svgHeight * (clip.y + clip.height);
      gsap.set(clip.selector, {
        attr: { height: 0, y: y },
      });
    });

    smallestClips.forEach((clip, i) => {
      const h = svgHeight * clip.height;
      const y = svgHeight * clip.y;
      tlSmallest.to(
        clip.selector,
        {
          attr: { height: h, y: y },
          duration: 1,
          ease: 'power2.out',
        },
        i === 0 ? 0 : '-=0.7'
      );
    });
  }
});
