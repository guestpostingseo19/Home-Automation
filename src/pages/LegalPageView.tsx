import { SEOHead } from '@/components/SEOHead';
import { useRevealClass } from '@/hooks/useReveal';
import { legalPages, type LegalPage } from '@/lib/data';
import { ArrowLeft, FileText, Shield } from 'lucide-react';

interface LegalProps {
  page: LegalPage;
  onNavigate: (to: string) => void;
}

export function LegalPageView({ page, onNavigate }: LegalProps) {
  const reveal = useRevealClass<HTMLDivElement>();

  const otherPages = legalPages.filter((p) => p.slug !== page.slug);

  return (
    <>
      <SEOHead title={`${page.title} — Hyvoxa`} description={page.intro.slice(0, 160)} />

      {/* Header */}
      <section className="bg-gunmetal-800 pt-32 pb-16 text-linen-100">
        <div className="absolute inset-0 bg-grid opacity-20" aria-hidden="true" />
        <div className="relative mx-auto max-w-4xl px-5 lg:px-8">
          <button
            onClick={() => onNavigate('/')}
            className="group inline-flex items-center gap-2 text-sm text-linen-400 transition-colors hover:text-tea-300"
          >
            <ArrowLeft className="h-4 w-4 transition-transform group-hover:-translate-x-1" />
            Back to Home
          </button>
          <div className="mt-6 flex items-center gap-3">
            <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-amaranth-600/20 text-tea-300 ring-1 ring-tea-300/20">
              <Shield className="h-6 w-6" />
            </div>
            <span className="text-xs font-bold uppercase tracking-[0.2em] text-tea-300">Legal</span>
          </div>
          <h1 className="mt-4 font-display text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-5xl text-balance">
            {page.title}
          </h1>
          <p className="mt-3 text-sm text-linen-400">Last updated: {page.lastUpdated}</p>
        </div>
      </section>

      {/* Content + sidebar */}
      <section className="bg-linen-100 py-16">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-12 lg:grid-cols-[1fr_280px]">
            {/* Article */}
            <div ref={reveal.ref} className={`min-w-0 ${reveal.className}`}>
              <p className="mb-10 text-lg leading-relaxed text-gunmetal-600 text-pretty border-l-4 border-amaranth-600 pl-6">
                {page.intro}
              </p>
              <div className="prose-hyvoxa max-w-none">
                {page.sections.map((section, i) => (
                  <div key={i}>
                    <h2>{section.heading}</h2>
                    {section.body.map((para, j) => (
                      <p key={j}>{para}</p>
                    ))}
                  </div>
                ))}
              </div>
              <div className="mt-12 rounded-xl bg-dust-300/40 p-6 text-center">
                <p className="text-sm text-gunmetal-500">
                  Questions about this policy? Email us at{' '}
                  <a href="mailto:hyvoxa@gmail.com" className="font-semibold text-amaranth-600 hover:underline">
                    hyvoxa@gmail.com
                  </a>
                </p>
              </div>
            </div>

            {/* Sidebar */}
            <aside className="lg:sticky lg:top-28 lg:self-start">
              <div className="rounded-2xl border border-gunmetal-900/10 bg-white p-6">
                <h3 className="flex items-center gap-2 font-display text-sm font-semibold uppercase tracking-wider text-gunmetal-800">
                  <FileText className="h-4 w-4 text-amaranth-600" />
                  Legal Documents
                </h3>
                <ul className="mt-4 space-y-1.5">
                  {legalPages.map((p) => {
                    const active = p.slug === page.slug;
                    return (
                      <li key={p.slug}>
                        <button
                          onClick={() => onNavigate(`/legal/${p.slug}`)}
                          className={`w-full rounded-lg px-3 py-2 text-left text-sm transition-colors ${
                            active
                              ? 'bg-amaranth-600/10 font-semibold text-amaranth-600'
                              : 'text-gunmetal-500 hover:bg-gunmetal-800/5 hover:text-gunmetal-800'
                          }`}
                        >
                          {p.title}
                        </button>
                      </li>
                    );
                  })}
                </ul>
              </div>
              <div className="mt-6 rounded-2xl bg-gunmetal-800 p-6 text-linen-100">
                <h3 className="font-display text-sm font-semibold uppercase tracking-wider text-tea-300">
                  Need help?
                </h3>
                <p className="mt-2 text-sm leading-relaxed text-linen-300">
                  Our team is happy to clarify any of our policies.
                </p>
                <a
                  href="mailto:hyvoxa@gmail.com"
                  className="mt-4 inline-block text-sm font-semibold text-tea-300 hover:text-tea-400"
                >
                  hyvoxa@gmail.com
                </a>
              </div>
              {otherPages.slice(0, 1).map((p) => (
                <button
                  key={p.slug}
                  onClick={() => onNavigate(`/legal/${p.slug}`)}
                  className="mt-6 flex w-full items-center justify-between rounded-2xl border border-gunmetal-900/10 bg-white p-5 text-left transition-all hover:border-amaranth-600/30 hover:shadow-md"
                >
                  <div>
                    <span className="text-xs text-gunmetal-400">Next document</span>
                    <p className="mt-1 font-display text-sm font-semibold text-gunmetal-800">{p.title}</p>
                  </div>
                  <ArrowLeft className="h-4 w-4 rotate-180 text-amaranth-600" />
                </button>
              ))}
            </aside>
          </div>
        </div>
      </section>
    </>
  );
}
