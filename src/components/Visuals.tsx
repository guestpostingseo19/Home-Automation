import { useEffect, useRef } from 'react';

/**
 * Renders an animated SVG smart-home illustration.
 * Pure CSS/SVG animation, no external assets.
 */
export function HeroIllustration() {
  const ref = useRef<SVGSVGElement>(null);

  return (
    <svg
      ref={ref}
      viewBox="0 0 500 420"
      className="h-full w-full"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      aria-hidden="true"
    >
      {/* glow base */}
      <ellipse cx="250" cy="380" rx="200" ry="30" fill="#d3efbd" opacity="0.08" />

      {/* house outline */}
      <path
        d="M120 210 L250 110 L380 210 L380 350 L120 350 Z"
        stroke="#d3efbd"
        strokeWidth="2"
        opacity="0.35"
        className="[stroke-dasharray:600] [stroke-dashoffset:600] animate-[fade-in_2s_ease_forwards]"
      />
      <path
        d="M120 210 L250 110 L380 210"
        stroke="#d3efbd"
        strokeWidth="3"
        opacity="0.6"
        className="[stroke-dasharray:300] [stroke-dashoffset:300] [animation:fade-in_1.5s_ease_0.5s_forwards]"
      />

      {/* roof accent */}
      <path d="M250 110 L250 80 M235 90 L250 80 L265 90" stroke="#8b2635" strokeWidth="2.5" strokeLinecap="round" />

      {/* signal waves from roof */}
      <g opacity="0.5">
        <circle cx="250" cy="80" r="12" stroke="#d3efbd" strokeWidth="1.5" className="origin-center animate-ping [animation-duration:3s]" />
        <circle cx="250" cy="80" r="20" stroke="#d3efbd" strokeWidth="1" className="origin-center animate-ping [animation-duration:3s] [animation-delay:0.6s]" opacity="0.6" />
        <circle cx="250" cy="80" r="28" stroke="#d3efbd" strokeWidth="1" className="origin-center animate-ping [animation-duration:3s] [animation-delay:1.2s]" opacity="0.3" />
      </g>

      {/* windows glowing */}
      <rect x="150" y="240" width="50" height="50" rx="4" fill="#d3efbd" opacity="0.15" stroke="#d3efbd" strokeWidth="1.5">
        <animate attributeName="opacity" values="0.15;0.45;0.15" dur="3s" repeatCount="indefinite" begin="1s" />
      </rect>
      <rect x="300" y="240" width="50" height="50" rx="4" fill="#d3efbd" opacity="0.15" stroke="#d3efbd" strokeWidth="1.5">
        <animate attributeName="opacity" values="0.45;0.15;0.45" dur="3s" repeatCount="indefinite" begin="1s" />
      </rect>

      {/* door */}
      <rect x="225" y="280" width="50" height="70" rx="4" fill="#8b2635" opacity="0.3" stroke="#8b2635" strokeWidth="2" />
      <circle cx="265" cy="318" r="2" fill="#d3efbd" />

      {/* floating device nodes */}
      <g className="animate-float">
        <circle cx="80" cy="160" r="14" fill="#2e3532" stroke="#d3efbd" strokeWidth="1.5" />
        <path d="M74 160 L86 160 M80 154 L80 166" stroke="#d3efbd" strokeWidth="1.5" strokeLinecap="round" />
      </g>
      <g className="animate-float [animation-delay:1.5s]">
        <circle cx="420" cy="170" r="14" fill="#2e3532" stroke="#d3efbd" strokeWidth="1.5" />
        <circle cx="420" cy="170" r="5" fill="none" stroke="#d3efbd" strokeWidth="1.5" />
      </g>
      <g className="animate-float [animation-delay:0.8s]">
        <rect x="38" y="280" width="28" height="28" rx="6" fill="#2e3532" stroke="#8b2635" strokeWidth="1.5" />
        <circle cx="52" cy="294" r="4" fill="#8b2635" />
      </g>
      <g className="animate-float [animation-delay:2s]">
        <rect x="438" y="280" width="28" height="28" rx="6" fill="#2e3532" stroke="#d3efbd" strokeWidth="1.5" />
        <path d="M446 294 L458 294" stroke="#d3efbd" strokeWidth="1.5" strokeLinecap="round" />
      </g>

      {/* connection lines */}
      <g stroke="#d3efbd" strokeWidth="1" opacity="0.2" strokeDasharray="4 4">
        <line x1="94" y1="160" x2="150" y2="240">
          <animate attributeName="stroke-dashoffset" values="0;-16" dur="1.5s" repeatCount="indefinite" />
        </line>
        <line x1="406" y1="170" x2="350" y2="240">
          <animate attributeName="stroke-dashoffset" values="0;-16" dur="1.5s" repeatCount="indefinite" />
        </line>
        <line x1="66" y1="294" x2="120" y2="310">
          <animate attributeName="stroke-dashoffset" values="0;-16" dur="2s" repeatCount="indefinite" />
        </line>
        <line x1="438" y1="294" x2="380" y2="310">
          <animate attributeName="stroke-dashoffset" values="0;-16" dur="2s" repeatCount="indefinite" />
        </line>
      </g>
    </svg>
  );
}

/**
 * A subtle animated gradient mesh background.
 */
export function GradientMesh({ className = '' }: { className?: string }) {
  return (
    <div className={`pointer-events-none absolute inset-0 overflow-hidden ${className}`} aria-hidden="true">
      <div className="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-amaranth-600/20 blur-[120px] animate-pulse-soft" />
      <div className="absolute -right-32 top-1/3 h-96 w-96 rounded-full bg-tea-400/10 blur-[120px] animate-pulse-soft [animation-delay:1.5s]" />
      <div className="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-amaranth-500/10 blur-[100px] animate-pulse-soft [animation-delay:0.8s]" />
    </div>
  );
}

/**
 * Animated counter that runs when scrolled into view.
 */
export function AnimatedCounter({
  value,
  suffix = '',
  duration = 1800,
}: {
  value: string;
  suffix?: string;
  duration?: number;
}) {
  const ref = useRef<HTMLSpanElement>(null);
  const started = useRef(false);

  useEffect(() => {
    const el = ref.current;
    if (!el) return;

    const numeric = parseFloat(value.replace(/[^0-9.]/g, ''));
    const hasDecimal = value.includes('.');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !started.current) {
          started.current = true;
          const start = performance.now();
          const tick = (now: number) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = numeric * eased;
            el.textContent = hasDecimal
              ? current.toFixed(1)
              : Math.floor(current).toString();
            if (progress < 1) requestAnimationFrame(tick);
            else el.textContent = hasDecimal ? numeric.toFixed(1) : Math.floor(numeric).toString();
          };
          requestAnimationFrame(tick);
        }
      });
    }, { threshold: 0.5 });

    observer.observe(el);
    return () => observer.disconnect();
  }, [value, duration]);

  return (
    <span ref={ref}>
      0{suffix}
    </span>
  );
}
