import type { ReactNode } from 'react';

interface NavItem {
  label: string;
  to: string;
}

const navItems: NavItem[] = [
  { label: 'Home', to: '/' },
  { label: 'Services', to: '/services' },
  { label: 'Blog', to: '/blog' },
  { label: 'About', to: '/about' },
  { label: 'Contact', to: '/contact' },
];

import { useEffect, useState } from 'react';
import { Menu, X, Cpu } from 'lucide-react';

interface NavbarProps {
  current: string;
  onNavigate: (to: string) => void;
}

function pathToRoute(path: string): string {
  const clean = path.replace(/^\/?/, '');
  return clean || '';
}

export function Navbar({ current, onNavigate }: NavbarProps) {
  const [scrolled, setScrolled] = useState(false);
  const [open, setOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 24);
    onScroll();
    window.addEventListener('scroll', onScroll);
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  const currentBase = pathToRoute(current).split('/')[0] || 'home';

  const go = (to: string) => {
    onNavigate(to);
    setOpen(false);
  };

  return (
    <header
      className={`fixed inset-x-0 top-0 z-50 transition-all duration-500 ${
        scrolled
          ? 'bg-gunmetal-800/90 glass shadow-lg shadow-gunmetal-950/20'
          : 'bg-transparent'
      }`}
    >
      <nav className="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">
        {/* Logo */}
        <button
          onClick={() => go('/')}
          className="group flex items-center gap-2.5"
          aria-label="Hyvoxa home"
        >
          <span className="relative flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-amaranth-600 to-amaranth-700 transition-transform duration-300 group-hover:scale-110">
            <Cpu className="h-5 w-5 text-linen-100" strokeWidth={2.5} />
            <span className="absolute inset-0 rounded-xl ring-1 ring-inset ring-linen-100/20" />
          </span>
          <span className="font-display text-xl font-bold tracking-tight text-linen-100">
            Hyvo<span className="text-tea-300">xa</span>
          </span>
        </button>

        {/* Desktop nav */}
        <ul className="hidden items-center gap-1 md:flex">
          {navItems.map((item) => {
            const itemBase = pathToRoute(item.to) || 'home';
            const active = currentBase === itemBase;
            return (
              <li key={item.to}>
                <button
                  onClick={() => go(item.to)}
                  className={`relative rounded-lg px-4 py-2 text-sm font-medium transition-colors duration-200 ${
                    active
                      ? 'text-tea-300'
                      : 'text-linen-300 hover:text-linen-100'
                  }`}
                >
                  {item.label}
                  <span
                    className={`absolute inset-x-3 -bottom-px h-px bg-tea-300 transition-transform duration-300 ${
                      active ? 'scale-x-100' : 'scale-x-0'
                    }`}
                  />
                </button>
              </li>
            );
          })}
        </ul>

        {/* CTA */}
        <button
          onClick={() => go('/contact')}
          className="hidden rounded-full bg-tea-300 px-5 py-2.5 text-sm font-semibold text-gunmetal-800 transition-all duration-300 hover:bg-tea-400 hover:shadow-lg hover:shadow-tea-400/30 md:block"
        >
          Get a Consultation
        </button>

        {/* Mobile toggle */}
        <button
          onClick={() => setOpen((v) => !v)}
          className="rounded-lg p-2 text-linen-100 md:hidden"
          aria-label="Toggle menu"
        >
          {open ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
        </button>
      </nav>

      {/* Mobile menu */}
      {open && (
        <div className="animate-slide-down bg-gunmetal-800/95 glass border-t border-linen-100/10 md:hidden">
          <ul className="flex flex-col gap-1 px-5 py-4">
            {navItems.map((item) => {
              const itemBase = pathToRoute(item.to) || 'home';
              const active = currentBase === itemBase;
              return (
                <li key={item.to}>
                  <button
                    onClick={() => go(item.to)}
                    className={`w-full rounded-lg px-4 py-3 text-left text-base font-medium transition-colors ${
                      active
                        ? 'bg-linen-100/5 text-tea-300'
                        : 'text-linen-200 hover:bg-linen-100/5'
                    }`}
                  >
                    {item.label}
                  </button>
                </li>
              );
            })}
            <li className="mt-2">
              <button
                onClick={() => go('/contact')}
                className="w-full rounded-full bg-tea-300 px-5 py-3 text-center text-sm font-semibold text-gunmetal-800"
              >
                Get a Consultation
              </button>
            </li>
          </ul>
        </div>
      )}
    </header>
  );
}

export function Footer({ onNavigate }: { onNavigate: (to: string) => void }) {
  const legalLinks = [
    { label: 'Privacy Policy', to: '/legal/privacy-policy' },
    { label: 'Terms of Service', to: '/legal/terms-of-service' },
    { label: 'Cookie Policy', to: '/legal/cookie-policy' },
    { label: 'Disclaimer', to: '/legal/disclaimer' },
    { label: 'Refund Policy', to: '/legal/refund-policy' },
  ];

  const serviceLinks: { label: string; to: string }[] = [
    { label: 'Intelligent Lighting', to: '/services/smart-lighting' },
    { label: 'Climate Automation', to: '/services/climate-control' },
    { label: 'Security & Surveillance', to: '/services/security-surveillance' },
    { label: 'Home Entertainment', to: '/services/home-entertainment' },
    { label: 'Voice & App Control', to: '/services/voice-automation' },
    { label: 'Outdoor & Garden', to: '/services/outdoor-automation' },
  ];

  return (
    <footer className="relative overflow-hidden bg-gunmetal-900 text-linen-200">
      <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
      <div className="relative mx-auto max-w-7xl px-5 py-16 lg:px-8">
        <div className="grid gap-12 lg:grid-cols-[1.5fr_1fr_1fr_1fr]">
          {/* Brand */}
          <div>
            <div className="flex items-center gap-2.5">
              <span className="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-amaranth-600 to-amaranth-700">
                <Cpu className="h-5 w-5 text-linen-100" strokeWidth={2.5} />
              </span>
              <span className="font-display text-xl font-bold text-linen-100">
                Hyvo<span className="text-tea-300">xa</span>
              </span>
            </div>
            <p className="mt-4 max-w-xs text-sm leading-relaxed text-linen-400">
              Premium smart home automation, designed and installed with
              obsessive attention to detail. Your home, intelligently yours.
            </p>
            <p className="mt-4 text-sm text-linen-500">
              <span className="text-linen-300">Email:</span>{' '}
              <a
                href="mailto:hyvoxa@gmail.com"
                className="text-tea-300 hover:text-tea-400 transition-colors"
              >
                hyvoxa@gmail.com
              </a>
            </p>
          </div>

          {/* Services */}
          <div>
            <h4 className="font-display text-sm font-semibold uppercase tracking-wider text-linen-300">
              Services
            </h4>
            <ul className="mt-4 space-y-2.5">
              {serviceLinks.map((s) => (
                <li key={s.to}>
                  <button
                    onClick={() => onNavigate(s.to)}
                    className="text-sm text-linen-400 transition-colors hover:text-tea-300"
                  >
                    {s.label}
                  </button>
                </li>
              ))}
            </ul>
          </div>

          {/* Company */}
          <div>
            <h4 className="font-display text-sm font-semibold uppercase tracking-wider text-linen-300">
              Company
            </h4>
            <ul className="mt-4 space-y-2.5">
              {[
                { label: 'About Us', to: '/about' },
                { label: 'Blog', to: '/blog' },
                { label: 'All Services', to: '/services' },
                { label: 'Contact', to: '/contact' },
              ].map((s) => (
                <li key={s.to}>
                  <button
                    onClick={() => onNavigate(s.to)}
                    className="text-sm text-linen-400 transition-colors hover:text-tea-300"
                  >
                    {s.label}
                  </button>
                </li>
              ))}
            </ul>
          </div>

          {/* Legal */}
          <div>
            <h4 className="font-display text-sm font-semibold uppercase tracking-wider text-linen-300">
              Legal
            </h4>
            <ul className="mt-4 space-y-2.5">
              {legalLinks.map((s) => (
                <li key={s.to}>
                  <button
                    onClick={() => onNavigate(s.to)}
                    className="text-sm text-linen-400 transition-colors hover:text-tea-300"
                  >
                    {s.label}
                  </button>
                </li>
              ))}
            </ul>
          </div>
        </div>

        <div className="mt-14 flex flex-col items-center justify-between gap-4 border-t border-linen-100/10 pt-8 sm:flex-row">
          <p className="text-xs text-linen-500">
            &copy; {new Date().getFullYear()} Hyvoxa. All rights reserved.
          </p>
          <p className="text-xs text-linen-500">
            Designed for intelligent living.
          </p>
        </div>
      </div>
    </footer>
  );
}

export function PageShell({ children }: { children: ReactNode }) {
  return <div className="flex min-h-screen flex-col bg-linen-100">{children}</div>;
}
