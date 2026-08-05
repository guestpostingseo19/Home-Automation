import { SEOHead } from '@/components/SEOHead';
import { GradientMesh } from '@/components/Visuals';
import { useRevealClass } from '@/hooks/useReveal';
import { blogPosts } from '@/lib/data';
import { ArrowRight, Clock, Search } from 'lucide-react';
import { useMemo, useState } from 'react';

interface BlogListProps {
  onNavigate: (to: string) => void;
}

export function BlogListPage({ onNavigate }: BlogListProps) {
  const categories = useMemo(
    () => ['All', ...Array.from(new Set(blogPosts.map((p) => p.category)))],
    []
  );
  const [active, setActive] = useState('All');
  const [query, setQuery] = useState('');

  const filtered = blogPosts.filter((p) => {
    const matchesCat = active === 'All' || p.category === active;
    const matchesQuery =
      !query ||
      p.title.toLowerCase().includes(query.toLowerCase()) ||
      p.excerpt.toLowerCase().includes(query.toLowerCase());
    return matchesCat && matchesQuery;
  });

  const featured = blogPosts[0];

  return (
    <>
      <SEOHead
        title="Smart Home Blog & Guides — Hyvoxa"
        description="Practical guides and expert insights on smart home automation, energy efficiency, security and the future of connected living from the Hyvoxa team."
      />

      {/* Hero */}
      <section className="relative overflow-hidden bg-gunmetal-800 pt-32 pb-20 text-linen-100">
        <GradientMesh />
        <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
        <div className="relative mx-auto max-w-4xl px-5 text-center lg:px-8">
          <span className="inline-flex items-center gap-2 rounded-full border border-tea-300/30 bg-tea-300/10 px-4 py-1.5 text-xs font-medium text-tea-300">
            Hyvoxa Blog
          </span>
          <h1 className="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            Insights for intelligent living
          </h1>
          <p className="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            Expert guides on smart home technology, energy savings, security
            and the trends shaping the future of home automation.
          </p>
        </div>
      </section>

      {/* Featured post */}
      <section className="bg-linen-100 py-16">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <button
            onClick={() => onNavigate(`/blog/${featured.slug}`)}
            className="group grid overflow-hidden rounded-2xl bg-white text-left shadow-xl shadow-gunmetal-900/10 ring-1 ring-gunmetal-900/5 transition-all duration-500 hover:shadow-2xl lg:grid-cols-2"
          >
            <div className="relative h-64 overflow-hidden lg:h-full">
              <img
                src={featured.image}
                alt={featured.title}
                className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
              />
              <span className="absolute left-5 top-5 rounded-full bg-amaranth-600 px-3 py-1 text-xs font-semibold text-linen-100">
                Featured
              </span>
            </div>
            <div className="flex flex-col justify-center p-8 lg:p-12">
              <div className="flex items-center gap-3 text-xs text-gunmetal-400">
                <span className="font-semibold text-amaranth-600">{featured.category}</span>
                <span>&middot;</span>
                <span>{featured.date}</span>
                <span>&middot;</span>
                <span className="inline-flex items-center gap-1">
                  <Clock className="h-3 w-3" />
                  {featured.readTime}
                </span>
              </div>
              <h2 className="mt-4 font-display text-2xl font-bold leading-snug text-gunmetal-800 group-hover:text-amaranth-600 transition-colors sm:text-3xl text-balance">
                {featured.title}
              </h2>
              <p className="mt-4 text-base leading-relaxed text-gunmetal-500 text-pretty">
                {featured.excerpt}
              </p>
              <span className="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-amaranth-600">
                Read the full article
                <ArrowRight className="h-4 w-4 transition-transform group-hover:translate-x-1" />
              </span>
            </div>
          </button>
        </div>
      </section>

      {/* Filter + grid */}
      <section className="bg-linen-100 pb-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          {/* Controls */}
          <div className="mb-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div className="flex flex-wrap gap-2">
              {categories.map((cat) => (
                <button
                  key={cat}
                  onClick={() => setActive(cat)}
                  className={`rounded-full px-4 py-2 text-sm font-medium transition-all ${
                    active === cat
                      ? 'bg-gunmetal-800 text-linen-100'
                      : 'bg-white text-gunmetal-500 ring-1 ring-gunmetal-900/10 hover:bg-gunmetal-800/5'
                  }`}
                >
                  {cat}
                </button>
              ))}
            </div>
            <div className="relative">
              <Search className="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gunmetal-400" />
              <input
                type="text"
                value={query}
                onChange={(e) => setQuery(e.target.value)}
                placeholder="Search articles..."
                className="w-full rounded-full border border-gunmetal-900/10 bg-white py-2.5 pl-10 pr-4 text-sm text-gunmetal-700 placeholder:text-gunmetal-400 focus:border-amaranth-600/40 focus:outline-none focus:ring-2 focus:ring-amaranth-600/10 sm:w-64"
              />
            </div>
          </div>

          {/* Grid */}
          {filtered.length > 0 ? (
            <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
              {filtered.map((post, i) => {
                const reveal = useRevealClass<HTMLButtonElement>(i * 80);
                return (
                  <button
                    key={post.slug}
                    ref={reveal.ref}
                    onClick={() => onNavigate(`/blog/${post.slug}`)}
                    className={`group flex flex-col overflow-hidden rounded-2xl bg-white text-left shadow-lg shadow-gunmetal-900/5 ring-1 ring-gunmetal-900/5 transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl ${reveal.className}`}
                  >
                    <div className="relative h-52 overflow-hidden">
                      <img
                        src={post.image}
                        alt={post.title}
                        className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                        loading="lazy"
                      />
                      <span className="absolute left-4 top-4 rounded-full bg-linen-100/90 px-3 py-1 text-xs font-semibold text-amaranth-600 backdrop-blur">
                        {post.category}
                      </span>
                    </div>
                    <div className="flex flex-1 flex-col p-6">
                      <div className="flex items-center gap-3 text-xs text-gunmetal-400">
                        <span>{new Date(post.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</span>
                        <span>&middot;</span>
                        <span className="inline-flex items-center gap-1">
                          <Clock className="h-3 w-3" />
                          {post.readTime}
                        </span>
                      </div>
                      <h3 className="mt-3 font-display text-lg font-semibold leading-snug text-gunmetal-800 group-hover:text-amaranth-600 transition-colors">
                        {post.title}
                      </h3>
                      <p className="mt-2 flex-1 text-sm leading-relaxed text-gunmetal-500 line-clamp-3">
                        {post.excerpt}
                      </p>
                      <span className="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
                        Read article
                        <ArrowRight className="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" />
                      </span>
                    </div>
                  </button>
                );
              })}
            </div>
          ) : (
            <div className="py-20 text-center">
              <p className="text-lg text-gunmetal-500">No articles match your search.</p>
              <button
                onClick={() => { setQuery(''); setActive('All'); }}
                className="mt-4 text-sm font-semibold text-amaranth-600 hover:underline"
              >
                Clear filters
              </button>
            </div>
          )}
        </div>
      </section>
    </>
  );
}
