import { SEOHead } from '@/components/SEOHead';
import { GradientMesh } from '@/components/Visuals';
import { useRevealClass } from '@/hooks/useReveal';
import { blogPosts, type BlogPost } from '@/lib/data';
import { ArrowLeft, ArrowRight, Clock, Calendar, User, Mail } from 'lucide-react';

interface BlogPostProps {
  post: BlogPost;
  onNavigate: (to: string) => void;
}

export function BlogPostPage({ post, onNavigate }: BlogPostProps) {
  const related = blogPosts.filter((p) => p.slug !== post.slug).slice(0, 3);
  const reveal = useRevealClass<HTMLDivElement>();

  return (
    <>
      <SEOHead title={`${post.title} — Hyvoxa Blog`} description={post.excerpt} />

      {/* Hero */}
      <section className="relative overflow-hidden bg-gunmetal-800 pt-32 pb-20 text-linen-100">
        <GradientMesh />
        <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
        <div className="relative mx-auto max-w-3xl px-5 lg:px-8">
          <button
            onClick={() => onNavigate('/blog')}
            className="group inline-flex items-center gap-2 text-sm text-linen-400 transition-colors hover:text-tea-300"
          >
            <ArrowLeft className="h-4 w-4 transition-transform group-hover:-translate-x-1" />
            Back to Blog
          </button>
          <span className="mt-6 inline-block rounded-full bg-tea-300/15 px-3 py-1 text-xs font-semibold text-tea-300">
            {post.category}
          </span>
          <h1 className="mt-4 font-display text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-5xl text-balance">
            {post.title}
          </h1>
          <div className="mt-6 flex flex-wrap items-center gap-5 text-sm text-linen-400">
            <span className="inline-flex items-center gap-1.5">
              <User className="h-4 w-4" />
              {post.author}
            </span>
            <span className="inline-flex items-center gap-1.5">
              <Calendar className="h-4 w-4" />
              {new Date(post.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}
            </span>
            <span className="inline-flex items-center gap-1.5">
              <Clock className="h-4 w-4" />
              {post.readTime} read
            </span>
          </div>
        </div>
      </section>

      {/* Cover image */}
      <div className="bg-gunmetal-800">
        <div className="mx-auto -mt-4 max-w-4xl px-5 lg:px-8">
          <div className="overflow-hidden rounded-2xl shadow-2xl shadow-gunmetal-950/40 ring-1 ring-linen-100/10">
            <img
              src={post.image}
              alt={post.title}
              className="aspect-[16/9] w-full object-cover"
            />
          </div>
        </div>
      </div>

      {/* Content */}
      <article className="bg-linen-100 py-16">
        <div ref={reveal.ref} className={`mx-auto max-w-3xl px-5 lg:px-8 ${reveal.className}`}>
          <p className="mb-8 text-xl font-medium leading-relaxed text-gunmetal-700 text-pretty">
            {post.excerpt}
          </p>
          <div className="prose-hyvoxa max-w-none">
            {post.content.map((block, i) => {
              if (block.startsWith('## ')) {
                return (
                  <h2 key={i}>{block.replace(/^##\s+/, '')}</h2>
                );
              }
              if (block.startsWith('### ')) {
                return (
                  <h3 key={i}>{block.replace(/^###\s+/, '')}</h3>
                );
              }
              return <p key={i}>{block}</p>;
            })}
          </div>

          {/* Share / contact strip */}
          <div className="mt-12 rounded-2xl bg-gunmetal-800 p-8 text-center text-linen-100">
            <h3 className="font-display text-xl font-bold">Have questions about your smart home?</h3>
            <p className="mt-2 text-sm text-linen-300">
              Our team is happy to help. Reach out any time.
            </p>
            <a
              href="mailto:hyvoxa@gmail.com"
              className="mt-5 inline-flex items-center gap-2 rounded-full bg-tea-300 px-6 py-3 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400"
            >
              <Mail className="h-4 w-4" />
              hyvoxa@gmail.com
            </a>
          </div>
        </div>
      </article>

      {/* Related */}
      <section className="bg-dust-300/40 py-20">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <h2 className="font-display text-2xl font-bold text-gunmetal-800 sm:text-3xl">
            Keep reading
          </h2>
          <div className="mt-8 grid gap-8 md:grid-cols-3">
            {related.map((rp, i) => {
              const reveal = useRevealClass<HTMLButtonElement>(i * 80);
              return (
                <button
                  key={rp.slug}
                  ref={reveal.ref}
                  onClick={() => onNavigate(`/blog/${rp.slug}`)}
                  className={`group flex flex-col overflow-hidden rounded-2xl bg-white text-left shadow-lg shadow-gunmetal-900/5 ring-1 ring-gunmetal-900/5 transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl ${reveal.className}`}
                >
                  <div className="relative h-44 overflow-hidden">
                    <img
                      src={rp.image}
                      alt={rp.title}
                      className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                      loading="lazy"
                    />
                    <span className="absolute left-4 top-4 rounded-full bg-linen-100/90 px-3 py-1 text-xs font-semibold text-amaranth-600 backdrop-blur">
                      {rp.category}
                    </span>
                  </div>
                  <div className="p-5">
                    <h3 className="font-display text-base font-semibold leading-snug text-gunmetal-800 group-hover:text-amaranth-600 transition-colors">
                      {rp.title}
                    </h3>
                    <span className="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
                      Read
                      <ArrowRight className="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" />
                    </span>
                  </div>
                </button>
              );
            })}
          </div>
        </div>
      </section>
    </>
  );
}
