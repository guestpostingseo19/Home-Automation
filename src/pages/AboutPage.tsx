import { SEOHead } from '@/components/SEOHead';
import { GradientMesh, AnimatedCounter } from '@/components/Visuals';
import { useRevealClass } from '@/hooks/useReveal';
import { site } from '@/lib/data';
import {
  Cpu,
  Heart,
  Award,
  Users,
  Leaf,
  ShieldCheck,
  ArrowRight,
  Sparkles,
  Target,
  Eye,
} from 'lucide-react';

interface AboutProps {
  onNavigate: (to: string) => void;
}

export function AboutPage({ onNavigate }: AboutProps) {
  return (
    <>
      <SEOHead
        title="About Hyvoxa — Our Story & Smart Home Expertise"
        description="Learn about Hyvoxa, a premium smart home automation company with 12 years of experience designing and installing intelligent homes for over 850 clients."
      />

      {/* Hero */}
      <section className="relative overflow-hidden bg-gunmetal-800 pt-32 pb-24 text-linen-100">
        <GradientMesh />
        <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
        <div className="relative mx-auto max-w-4xl px-5 text-center lg:px-8">
          <span className="inline-flex items-center gap-2 rounded-full border border-tea-300/30 bg-tea-300/10 px-4 py-1.5 text-xs font-medium text-tea-300">
            <Sparkles className="h-3.5 w-3.5" />
            Our Story
          </span>
          <h1 className="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            We build homes that
            <span className="block bg-gradient-to-r from-tea-300 to-amaranth-400 bg-clip-text text-transparent">
              think and feel
            </span>
          </h1>
          <p className="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            For over a decade, Hyvoxa has been designing and installing smart
            home systems that blend advanced technology with genuine human
            empathy. We believe a home should serve the people who live in it,
            quietly and beautifully.
          </p>
        </div>
      </section>

      {/* Stats */}
      <section className="bg-linen-100 py-16">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid grid-cols-2 gap-8 lg:grid-cols-4">
            {site.stats.map((stat, i) => {
              const reveal = useRevealClass<HTMLDivElement>(i * 80);
              return (
                <div key={stat.label} ref={reveal.ref} className={`text-center ${reveal.className}`}>
                  <div className="font-display text-4xl font-bold text-amaranth-600 lg:text-5xl">
                    <AnimatedCounter value={stat.value} />
                  </div>
                  <div className="mt-2 text-sm font-medium text-gunmetal-500">{stat.label}</div>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Mission & Vision */}
      <section className="bg-dust-300/40 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-8 md:grid-cols-2">
            {[
              {
                icon: Target,
                tag: 'Our Mission',
                title: 'Make intelligent living effortless',
                body: 'We exist to remove friction from daily life through technology that anticipates, adapts and disappears. Every system we design is measured against one question: does this genuinely make life better for the people who live here?',
              },
              {
                icon: Eye,
                tag: 'Our Vision',
                title: 'A world where every home is intelligent',
                body: 'We envision a future where smart homes are not a luxury but a standard, where energy efficiency, security and comfort are built into the fabric of every residence, and where the technology is so well integrated that it is felt rather than seen.',
              },
            ].map((item, i) => {
              const reveal = useRevealClass<HTMLDivElement>(i * 100);
              return (
                <div
                  key={item.tag}
                  ref={reveal.ref}
                  className={`rounded-2xl border border-gunmetal-900/10 bg-linen-100 p-8 shadow-sm ${reveal.className}`}
                >
                  <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-amaranth-600/10 text-amaranth-600">
                    <item.icon className="h-7 w-7" />
                  </div>
                  <span className="mt-5 block text-xs font-bold uppercase tracking-wider text-amaranth-600">
                    {item.tag}
                  </span>
                  <h2 className="mt-2 font-display text-2xl font-bold text-gunmetal-800">{item.title}</h2>
                  <p className="mt-3 text-base leading-relaxed text-gunmetal-500 text-pretty">{item.body}</p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Values */}
      <section className="bg-linen-100 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="mx-auto max-w-2xl text-center">
            <span className="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">What drives us</span>
            <h2 className="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">
              The principles behind every install
            </h2>
          </div>
          <div className="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {[
              { icon: Heart, title: 'Human-Centered Design', desc: 'Technology is only valuable when it serves people. We design around how you live, not around what devices can do.' },
              { icon: Cpu, title: 'Engineering Excellence', desc: 'Concealed wiring, calibrated systems and meticulous attention to detail. We hold our work to the highest technical standard.' },
              { icon: Award, title: 'Uncompromising Quality', desc: 'We use premium components and refuse to cut corners. A Hyvoxa system is built to perform flawlessly for years.' },
              { icon: Users, title: 'Genuine Partnership', desc: 'We see clients as long-term relationships, not transactions. Your system evolves with your life, and we are there for every change.' },
              { icon: Leaf, title: 'Sustainable Practice', desc: 'Energy-aware automation and responsible sourcing. We help you reduce your footprint without sacrificing comfort.' },
              { icon: ShieldCheck, title: 'Privacy First', desc: 'Local processing and encrypted access. Your home data belongs to you, and we design our systems to keep it that way.' },
            ].map((v, i) => {
              const reveal = useRevealClass<HTMLDivElement>(i * 80);
              return (
                <div
                  key={v.title}
                  ref={reveal.ref}
                  className={`group rounded-2xl border border-gunmetal-900/10 bg-white p-7 transition-all hover:border-amaranth-600/30 hover:shadow-lg ${reveal.className}`}
                >
                  <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-amaranth-600/10 text-amaranth-600 transition-colors group-hover:bg-amaranth-600 group-hover:text-linen-100">
                    <v.icon className="h-6 w-6" />
                  </div>
                  <h3 className="mt-4 font-display font-semibold text-gunmetal-800">{v.title}</h3>
                  <p className="mt-2 text-sm leading-relaxed text-gunmetal-500">{v.desc}</p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Journey timeline */}
      <section className="bg-gunmetal-800 py-24 text-linen-100">
        <div className="absolute inset-0 bg-grid opacity-20" aria-hidden="true" />
        <div className="relative mx-auto max-w-4xl px-5 lg:px-8">
          <div className="text-center">
            <span className="text-xs font-bold uppercase tracking-[0.2em] text-tea-300">Our Journey</span>
            <h2 className="mt-3 font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">
              Twelve years of intelligent homes
            </h2>
          </div>
          <div className="mt-14 space-y-8">
            {[
              { year: '2013', title: 'The first install', desc: 'Hyvoxa begins with a single whole-home lighting project in Portland. The philosophy is set: technology should serve, never complicate.' },
              { year: '2016', title: 'Expansion into security', desc: 'We integrate surveillance and access control, offering complete home protection alongside automation.' },
              { year: '2019', title: '500 homes automated', desc: 'A milestone reached through word-of-mouth referrals and a reputation for meticulous, reliable work.' },
              { year: '2022', title: 'AI and energy intelligence', desc: 'We introduce predictive routines and energy-aware automation, cutting average client energy use by 40%.' },
              { year: '2025', title: 'Matter-ready future', desc: 'Our platforms adopt the Matter standard, ensuring every system we install remains compatible with the devices of tomorrow.' },
            ].map((item, i) => {
              const reveal = useRevealClass<HTMLDivElement>(i * 100);
              return (
                <div
                  key={item.year}
                  ref={reveal.ref}
                  className={`relative grid grid-cols-[auto_1fr] gap-6 ${reveal.className}`}
                >
                  <div className="flex flex-col items-center">
                    <span className="flex h-14 w-14 items-center justify-center rounded-full bg-amaranth-600 font-display text-sm font-bold text-linen-100 ring-4 ring-gunmetal-900">
                      {item.year}
                    </span>
                    {i < 4 && <span className="mt-2 h-full w-px bg-linen-100/20" />}
                  </div>
                  <div className="pb-4">
                    <h3 className="font-display text-lg font-semibold text-linen-100">{item.title}</h3>
                    <p className="mt-1.5 text-sm leading-relaxed text-linen-400 text-pretty">{item.desc}</p>
                  </div>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="relative overflow-hidden bg-amaranth-600 py-24">
        <div className="absolute inset-0 bg-grid opacity-20" aria-hidden="true" />
        <div className="relative mx-auto max-w-3xl px-5 text-center lg:px-8">
          <h2 className="font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">
            Let's build your intelligent home together
          </h2>
          <p className="mt-4 text-lg text-linen-200 text-pretty">
            Reach out for a consultation and discover what Hyvoxa can do for
            your home and your daily life.
          </p>
          <button
            onClick={() => onNavigate('/contact')}
            className="mt-8 inline-flex items-center gap-2 rounded-full bg-linen-100 px-7 py-3.5 font-semibold text-amaranth-600 transition-all hover:bg-white hover:shadow-xl"
          >
            Get in Touch
            <ArrowRight className="h-4 w-4" />
          </button>
        </div>
      </section>
    </>
  );
}
