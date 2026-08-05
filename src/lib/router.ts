import { useEffect, useState, useCallback } from 'react';

export type Route =
  | { name: 'home' }
  | { name: 'services' }
  | { name: 'service'; slug: string }
  | { name: 'blog' }
  | { name: 'post'; slug: string }
  | { name: 'about' }
  | { name: 'contact' }
  | { name: 'legal'; slug: string };

export function parseHash(hash: string): Route {
  const clean = hash.replace(/^#\/?/, '').trim();
  if (!clean) return { name: 'home' };

  const parts = clean.split('/').filter(Boolean);

  if (parts[0] === 'services' && parts.length === 1) return { name: 'services' };
  if (parts[0] === 'services' && parts[1])
    return { name: 'service', slug: parts[1] };
  if (parts[0] === 'blog' && parts.length === 1) return { name: 'blog' };
  if (parts[0] === 'blog' && parts[1]) return { name: 'post', slug: parts[1] };
  if (parts[0] === 'about') return { name: 'about' };
  if (parts[0] === 'contact') return { name: 'contact' };
  if (parts[0] === 'legal' && parts[1]) return { name: 'legal', slug: parts[1] };

  return { name: 'home' };
}

export function useHashRoute(): [Route, (to: string) => void] {
  const [route, setRoute] = useState<Route>(() =>
    parseHash(window.location.hash)
  );

  useEffect(() => {
    const onHash = () => {
      setRoute(parseHash(window.location.hash));
      window.scrollTo({ top: 0, behavior: 'auto' });
    };
    window.addEventListener('hashchange', onHash);
    return () => window.removeEventListener('hashchange', onHash);
  }, []);

  const navigate = useCallback((to: string) => {
    const target = to.startsWith('#') ? to : `#${to}`;
    if (window.location.hash === target) {
      window.scrollTo({ top: 0, behavior: 'smooth' });
      return;
    }
    window.location.hash = target;
  }, []);

  return [route, navigate];
}

export function hrefFor(to: string): string {
  return `#${to.startsWith('/') ? to : `/${to}`}`;
}
