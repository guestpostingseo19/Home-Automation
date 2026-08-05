import { SEOHead } from '@/components/SEOHead';
import { GradientMesh, HeroIllustration, AnimatedCounter } from '@/components/Visuals';
import { useRevealClass } from '@/hooks/useReveal';
import { site, services, blogPosts } from '@/lib/data';
import {
  ArrowRight,
  Lightbulb,
  Thermometer,
  ShieldCheck,
  Clapperboard,
  Mic,
  Trees,
  Cpu,
  Zap,
  Leaf,
  Lock,
  Sparkles,
  CheckCircle2,
  Quote,
  Phone,
  Mail,
  MapPin,
  Clock,
} from 'lucide-react';

const iconMap: Record<string, typeof Lightbulb> = {
  Lightbulb,
  Thermometer,
  ShieldCheck,
  Clapperboard,
  Mic,
  Trees,
};

interface HomeProps {
  onNavigate: (to: string) => void;
}

export function HomePage({ onNavigate }: HomeProps) {
  const heroReveal = useRevealClass<HTMLDivElement>();
  const statsReveal = useRevealClass<HTMLDivElement>();
  const processReveal = useRevealClass<HTMLDivElement>();

  return (
    <>
      <SEOHead
        title="Hyvoxa — Premium Smart Home Automation Services"
        description={site.description}
      />

      {/* Hero */}
      <section className="relative flex min-h-screen items-center overflow-hidden bg-gunmetal-800 pt-20">
        <GradientMesh />
        <div className="absolute inset-0 bg-grid opacity-40" aria-hidden="true" />
        <div className="relative mx-auto grid max-w-7xl items-center gap-12 px-5 py-20 lg:grid-cols-2 lg:px-8">
          <div ref={heroReveal.ref} className={heroReveal.className}>
            <span className="inline-flex items-center gap-2 rounded-full border border-tea-300/30 bg-tea-300/10 px-4 py-1.5 text-xs font-medium text-tea-300">
              <Sparkles className="h-3.5 w-3.5" />
              Premium Home Automation, End to End
            </span>
            <h1 className="mt-6 font-display text-5xl font-bold leading-[1.05] tracking-tight text-linen-100 sm:text-6xl lg:text-7xl text-balance">
              Your home,
              <br />
              <span className="bg-gradient-to-r from-tea-300 via-tea-400 to-amaranth-400 bg-clip-text text-transparent">
                intelligently yours
              </span>
            </h1>
            <p className="mt-6 max-w-xl text-lg leading-relaxed text-linen-300 text-pretty">
              Hyvoxa designs, installs and maintains smart home systems that
              adapt to how you live. Lighting, climate, security, entertainment
              and voice control, orchestrated as one seamless experience.
            </p>
            <div className="mt-8 flex flex-wrap gap-4">
              <button
                onClick={() => onNavigate('/contact')}
                className="group inline-flex items-center gap-2 rounded-full bg-tea-300 px-7 py-3.5 font-semibold text-gunmetal-800 transition-all duration-300 hover:bg-tea-400 hover:shadow-xl hover:shadow-tea-400/30"
              >
                Book a Consultation
                <ArrowRight className="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
              </button>
              <button
                onClick={() => onNavigate('/services')}
                className="inline-flex items-center gap-2 rounded-full border border-linen-100/20 px-7 py-3.5 font-semibold text-linen-100 transition-all duration-300 hover:border-tea-300/50 hover:bg-linen-100/5"
              >
                Explore Services
              </button>
            </div>
            <div className="mt-10 flex items-center gap-6 text-sm text-linen-400">
              <div className="flex items-center gap-2">
                <CheckCircle2 className="h-4 w-4 text-tea-400" />
                12+ years experience
              </div>
              <div className="flex items-center gap-2">
                <CheckCircle2 className="h-4 w-4 text-tea-400" />
                850+ homes automated
              </div>
            </div>
          </div>

          <div className="relative animate-fade-in-up">
            <HeroIllustration />
          </div>
        </div>

        {/* bottom fade */}
        <div className="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-linen-100 to-transparent" aria-hidden="true" />
      </section>

      {/* Stats bar */}
      <section className="relative -mt-16 z-10 bg-linen-100">
        <div ref={statsReveal.ref} className={`mx-auto max-w-7xl px-5 lg:px-8 ${statsReveal.className}`}>
          <div className="grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-gunmetal-900/10 bg-gunmetal-900/10 shadow-xl shadow-gunmetal-900/5 lg:grid-cols-4">
            {site.stats.map((stat, i) => (
              <div
                key={stat.label}
                className="group relative flex flex-col items-center justify-center bg-linen-100 p-8 text-center transition-colors hover:bg-white"
                style={{ transitionDelay: `${i * 80}ms` }}
              >
                <div className="font-display text-4xl font-bold text-amaranth-600 lg:text-5xl">
                  <AnimatedCounter value={stat.value} />
                </div>
                <div className="mt-2 text-sm font-medium text-gunmetal-500">
                  {stat.label}
                </div>
                <span className="absolute inset-x-0 bottom-0 h-0.5 origin-left scale-x-0 bg-amaranth-600 transition-transform duration-500 group-hover:scale-x-100" />
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Intro / Value */}
      <section className="bg-linen-100 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-12 lg:grid-cols-[1fr_1.2fr] lg:items-center">
            <ValueIntro />
            <ValueGrid />
          </div>
        </div>
      </section>

      {/* Services preview */}
      <section className="bg-dust-300/40 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <SectionHeading
            eyebrow="What We Do"
            title="Six pillars of a smarter home"
            subtitle="Every Hyvoxa system is built from these core services. Choose one or combine them all into a single, unified platform."
          />
          <div className="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {services.map((s, i) => {
              const Icon = iconMap[s.icon] ?? Cpu;
              return (
                <ServiceCard
                  key={s.slug}
                  icon={<Icon className="h-6 w-6" />}
                  title={s.title}
                  short={s.short}
                  image={s.image}
                  delay={i * 100}
                  onClick={() => onNavigate(`/services/${s.slug}`)}
                />
              );
            })}
          </div>
          <div className="mt-12 text-center">
            <button
              onClick={() => onNavigate('/services')}
              className="group inline-flex items-center gap-2 rounded-full bg-gunmetal-800 px-7 py-3.5 font-semibold text-linen-100 transition-all hover:bg-gunmetal-900 hover:shadow-xl"
            >
              View All Services
              <ArrowRight className="h-4 w-4 transition-transform group-hover:translate-x-1" />
            </button>
          </div>
        </div>
      </section>

      {/* Process */}
      <section className="bg-gunmetal-800 py-24 text-linen-100">
        <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
        <div className="relative mx-auto max-w-7xl px-5 lg:px-8">
          <div ref={processReveal.ref} className={processReveal.className}>
            <SectionHeading
              dark
              eyebrow="How It Works"
              title="From first conversation to effortless living"
              subtitle="A refined, four-step process that ensures every system we install is tailored, reliable and genuinely life-improving."
            />
          </div>
          <div className="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            {site.process.map((p, i) => (
              <ProcessCard key={p.step} {...p} index={i} />
            ))}
          </div>
        </div>
      </section>

      {/* Why choose us */}
      <section className="bg-linen-100 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-16 lg:grid-cols-2 lg:items-center">
            <div className="relative">
              <img
                src="https://images.pexels.com/photos/16423103/pexels-photo-16423103.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                alt="A hand using a tablet to control a smart home system"
                className="rounded-2xl shadow-2xl shadow-gunmetal-900/20"
                loading="lazy"
              />
              <div className="absolute -bottom-6 -right-6 hidden rounded-2xl bg-amaranth-600 p-6 text-linen-100 shadow-xl sm:block">
                <div className="font-display text-3xl font-bold">100%</div>
                <div className="text-sm text-linen-200">Bespoke Design</div>
              </div>
            </div>
            <div>
              <SectionHeading
                align="left"
                eyebrow="Why Hyvoxa"
                title="Engineering meets empathy"
                subtitle="We are not just integrators. We are designers who believe technology should disappear into the background of a well-lived life."
              />
              <div className="mt-8 space-y-5">
                {[
                  { icon: Cpu, title: 'Local processing, zero cloud dependency', desc: 'Your home responds instantly and privately, even when the internet is down.' },
                  { icon: Zap, title: 'One platform, every device', desc: 'No more juggling a dozen manufacturer apps. A single, polished interface for everything.' },
                  { icon: Leaf, title: 'Energy-aware automation', desc: 'Sensors and schedules cut energy waste by up to 40% without changing your habits.' },
                  { icon: Lock, title: 'Security as a foundation', desc: 'Network segmentation, encrypted access and AI-driven surveillance built into every install.' },
                ].map((item) => (
                  <div key={item.title} className="flex gap-4">
                    <div className="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-tea-300/30 text-amaranth-600">
                      <item.icon className="h-5 w-5" />
                    </div>
                    <div>
                      <h3 className="font-display font-semibold text-gunmetal-800">{item.title}</h3>
                      <p className="mt-1 text-sm leading-relaxed text-gunmetal-500">{item.desc}</p>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Testimonial */}
      <section className="bg-dust-300/40 py-24">
        <div className="mx-auto max-w-4xl px-5 text-center lg:px-8">
          <Quote className="mx-auto h-10 w-10 text-amaranth-600/40" />
          <blockquote className="mt-6 font-display text-2xl font-medium leading-relaxed text-gunmetal-800 sm:text-3xl text-balance">
            &ldquo;Hyvoxa transformed our house into something that anticipates
            us. We never think about lights, temperature or security anymore,
            it just works, beautifully.&rdquo;
          </blockquote>
          <div className="mt-6">
            <div className="font-semibold text-gunmetal-800">Sarah &amp; David Chen</div>
            <div className="text-sm text-gunmetal-500">Portland, OR &middot; Whole-home automation client</div>
          </div>
        </div>
      </section>

      {/* Blog preview */}
      <section className="bg-linen-100 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <SectionHeading
            eyebrow="Insights"
            title="Latest from the Hyvoxa blog"
            subtitle="Practical guides and forward-looking analysis on smart home technology, energy efficiency and secure living."
          />
          <div className="mt-14 grid gap-8 md:grid-cols-3">
            {blogPosts.slice(0, 3).map((post, i) => (
              <BlogCard key={post.slug} post={post} delay={i * 100} onClick={() => onNavigate(`/blog/${post.slug}`)} />
            ))}
          </div>
          <div className="mt-12 text-center">
            <button
              onClick={() => onNavigate('/blog')}
              className="group inline-flex items-center gap-2 rounded-full border border-gunmetal-800/20 px-7 py-3.5 font-semibold text-gunmetal-800 transition-all hover:bg-gunmetal-800 hover:text-linen-100"
            >
              Read the Blog
              <ArrowRight className="h-4 w-4 transition-transform group-hover:translate-x-1" />
            </button>
          </div>
        </div>
      </section>

      {/* CTA */}
      <CTASection onNavigate={onNavigate} />
    </>
  );
}

/* ---------- Section sub-components ---------- */

function SectionHeading({
  eyebrow,
  title,
  subtitle,
  dark = false,
  align = 'center',
}: {
  eyebrow: string;
  title: string;
  subtitle?: string;
  dark?: boolean;
  align?: 'center' | 'left';
}) {
  const reveal = useRevealClass();
  return (
    <div
      ref={reveal.ref}
      className={`${reveal.className} ${align === 'center' ? 'mx-auto max-w-2xl text-center' : 'max-w-xl'}`}
    >
      <span className={`text-xs font-bold uppercase tracking-[0.2em] ${dark ? 'text-tea-300' : 'text-amaranth-600'}`}>
        {eyebrow}
      </span>
      <h2 className={`mt-3 font-display text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl text-balance ${dark ? 'text-linen-100' : 'text-gunmetal-800'}`}>
        {title}
      </h2>
      {subtitle && (
        <p className={`mt-4 text-lg leading-relaxed text-pretty ${dark ? 'text-linen-300' : 'text-gunmetal-500'}`}>
          {subtitle}
        </p>
      )}
    </div>
  );
}

function ServiceCard({
  icon,
  title,
  short,
  image,
  delay,
  onClick,
}: {
  icon: React.ReactNode;
  title: string;
  short: string;
  image: string;
  delay: number;
  onClick: () => void;
}) {
  const reveal = useRevealClass<HTMLButtonElement>(delay);
  return (
    <button
      ref={reveal.ref}
      onClick={onClick}
      className={`group relative overflow-hidden rounded-2xl bg-linen-100 text-left shadow-lg shadow-gunmetal-900/5 ring-1 ring-gunmetal-900/5 transition-all duration-500 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-gunmetal-900/15 ${reveal.className}`}
    >
      <div className="relative h-48 overflow-hidden">
        <img
          src={image}
          alt={title}
          className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
          loading="lazy"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-gunmetal-900/70 to-transparent" />
        <div className="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-xl bg-linen-100/90 text-amaranth-600 backdrop-blur">
          {icon}
        </div>
      </div>
      <div className="p-6">
        <h3 className="font-display text-lg font-semibold text-gunmetal-800">{title}</h3>
        <p className="mt-2 text-sm leading-relaxed text-gunmetal-500">{short}</p>
        <span className="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
          Learn more
          <ArrowRight className="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" />
        </span>
      </div>
    </button>
  );
}

function ProcessCard({
  step,
  title,
  desc,
  index,
}: {
  step: string;
  title: string;
  desc: string;
  index: number;
}) {
  const reveal = useRevealClass<HTMLDivElement>(index * 120);
  return (
    <div
      ref={reveal.ref}
      className={`group relative rounded-2xl border border-linen-100/10 bg-gunmetal-900/40 p-6 backdrop-blur transition-colors hover:border-tea-300/30 hover:bg-gunmetal-900/60 ${reveal.className}`}
    >
      <div className="font-display text-5xl font-bold text-tea-300/30 transition-colors group-hover:text-tea-300/50">
        {step}
      </div>
      <h3 className="mt-3 font-display text-lg font-semibold text-linen-100">{title}</h3>
      <p className="mt-2 text-sm leading-relaxed text-linen-400">{desc}</p>
    </div>
  );
}

function BlogCard({
  post,
  delay,
  onClick,
}: {
  post: { slug: string; title: string; excerpt: string; image: string; category: string; readTime: string; date: string };
  delay: number;
  onClick: () => void;
}) {
  const reveal = useRevealClass<HTMLButtonElement>(delay);
  const dateStr = new Date(post.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
  return (
    <button
      ref={reveal.ref}
      onClick={onClick}
      className={`group flex flex-col overflow-hidden rounded-2xl bg-linen-100 text-left shadow-lg shadow-gunmetal-900/5 ring-1 ring-gunmetal-900/5 transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl ${reveal.className}`}
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
          <span>{dateStr}</span>
          <span>&middot;</span>
          <span>{post.readTime} read</span>
        </div>
        <h3 className="mt-3 font-display text-lg font-semibold leading-snug text-gunmetal-800 group-hover:text-amaranth-600 transition-colors">
          {post.title}
        </h3>
        <p className="mt-2 flex-1 text-sm leading-relaxed text-gunmetal-500 line-clamp-3">{post.excerpt}</p>
        <span className="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
          Read article
          <ArrowRight className="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" />
        </span>
      </div>
    </button>
  );
}

function ValueIntro() {
  const reveal = useRevealClass();
  return (
    <div ref={reveal.ref} className={reveal.className}>
      <span className="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">
        The Hyvoxa Difference
      </span>
      <h2 className="mt-3 font-display text-3xl font-bold tracking-tight text-gunmetal-800 sm:text-4xl lg:text-5xl text-balance">
        A home that anticipates you
      </h2>
      <p className="mt-5 text-lg leading-relaxed text-gunmetal-500 text-pretty">
        We believe the best technology is the kind you stop noticing. When your
        lighting shifts as the sun sets, when the house is warm the moment you
        walk in, when the doors lock themselves at night, you stop managing
        your home and start simply living in it.
      </p>
      <p className="mt-4 text-base leading-relaxed text-gunmetal-500 text-pretty">
        That effortless feeling is what Hyvoxa engineers into every project.
        Not a collection of gadgets, but a single, intelligent system designed
        around the way you actually live.
      </p>
    </div>
  );
}

function ValueGrid() {
  const reveal = useRevealClass<HTMLDivElement>(120);
  const values = [
    { icon: Sparkles, title: 'Tailored to You', desc: 'No two homes or families are alike. Every system is designed around your routines.' },
    { icon: Cpu, title: 'Professionally Engineered', desc: 'Certified technicians, concealed wiring and meticulous calibration on every install.' },
    { icon: Leaf, title: 'Sustainable by Design', desc: 'Energy-aware automation that lowers bills and your environmental footprint.' },
    { icon: ShieldCheck, title: 'Secure & Private', desc: 'Local processing and encrypted access keep your home responsive and your data yours.' },
  ];
  return (
    <div ref={reveal.ref} className={`grid gap-5 sm:grid-cols-2 ${reveal.className}`}>
      {values.map((v) => (
        <div
          key={v.title}
          className="group rounded-2xl border border-gunmetal-900/10 bg-linen-100 p-6 transition-all duration-300 hover:border-amaranth-600/30 hover:shadow-lg"
        >
          <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-amaranth-600/10 text-amaranth-600 transition-colors group-hover:bg-amaranth-600 group-hover:text-linen-100">
            <v.icon className="h-6 w-6" />
          </div>
          <h3 className="mt-4 font-display font-semibold text-gunmetal-800">{v.title}</h3>
          <p className="mt-1.5 text-sm leading-relaxed text-gunmetal-500">{v.desc}</p>
        </div>
      ))}
    </div>
  );
}

export function CTASection({ onNavigate }: { onNavigate: (to: string) => void }) {
  const reveal = useRevealClass();
  return (
    <section className="relative overflow-hidden bg-amaranth-600 py-24">
      <div className="absolute inset-0 bg-grid opacity-20" aria-hidden="true" />
      <div className="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-amaranth-400/30 blur-[120px]" aria-hidden="true" />
      <div ref={reveal.ref} className={`relative mx-auto max-w-4xl px-5 text-center lg:px-8 ${reveal.className}`}>
        <h2 className="font-display text-3xl font-bold tracking-tight text-linen-100 sm:text-4xl lg:text-5xl text-balance">
          Ready to live in a home that thinks?
        </h2>
        <p className="mt-4 text-lg text-linen-200 text-pretty">
          Book a no-obligation consultation. We will visit your home, listen to
          how you live and design a system that fits your life perfectly.
        </p>
        <div className="mt-8 flex flex-wrap justify-center gap-4">
          <button
            onClick={() => onNavigate('/contact')}
            className="group inline-flex items-center gap-2 rounded-full bg-linen-100 px-7 py-3.5 font-semibold text-amaranth-600 transition-all hover:bg-white hover:shadow-xl"
          >
            Get in Touch
            <ArrowRight className="h-4 w-4 transition-transform group-hover:translate-x-1" />
          </button>
          <a
            href="mailto:hyvoxa@gmail.com"
            className="inline-flex items-center gap-2 rounded-full border border-linen-100/30 px-7 py-3.5 font-semibold text-linen-100 transition-all hover:bg-linen-100/10"
          >
            <Mail className="h-4 w-4" />
            hyvoxa@gmail.com
          </a>
        </div>
      </div>
    </section>
  );
}
