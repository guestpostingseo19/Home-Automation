import { useEffect, useRef, useState } from 'react';

/**
 * Reveal-on-scroll hook using IntersectionObserver.
 * Returns a ref to attach and a boolean for visibility.
 */
export function useReveal<T extends HTMLElement = HTMLDivElement>(
  options?: IntersectionObserverInit
): [React.RefObject<T>, boolean] {
  const ref = useRef<T>(null);
  const [visible, setVisible] = useState(false);

  useEffect(() => {
    const el = ref.current;
    if (!el) return;
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            setVisible(true);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -60px 0px', ...options }
    );
    observer.observe(el);
    return () => observer.disconnect();
  }, [options]);

  return [ref, visible];
}

/**
 * Attach the reveal class to any element and trigger when in view.
 * Usage: const { ref, className } = useRevealClass();
 *        <div ref={ref} className={className}>...</div>
 */
export function useRevealClass<T extends HTMLElement = HTMLDivElement>(
  delay = 0
): { ref: React.RefObject<T>; className: string } {
  const [ref, visible] = useReveal<T>();
  const className = `reveal ${visible ? 'is-visible' : ''}`;
  return {
    ref,
    className: delay
      ? `${className} [transition-delay:${delay}ms]`
      : className,
  };
}
