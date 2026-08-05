import { SEOHead } from '@/components/SEOHead';
import { GradientMesh } from '@/components/Visuals';
import { useRevealClass } from '@/hooks/useReveal';
import { services, type Service } from '@/lib/data';
import {
  ArrowRight,
  ArrowLeft,
  Lightbulb,
  Thermometer,
  ShieldCheck,
  Clapperboard,
  Mic,
  Trees,
  Cpu,
  CheckCircle2,
  ChevronDown,
  Mail,
} from 'lucide-react';
import { useState } from 'react';

const iconMap: Record<string, typeof Lightbulb> = {
  Lightbulb,
  Thermometer,
  ShieldCheck,
  Clapperboard,
  Mic,
  Trees,
};

interface ServiceDetailProps {
  service: Service;
  onNavigate: (to: string) => void;
}

export function ServiceDetailPage({ service, onNavigate }: ServiceDetailProps) {
  const Icon = iconMap[service.icon] ?? Cpu;
  const idx = services.findIndex((s) => s.slug === service.slug);
  const next = services[(idx + 1) % services.length];

  return (
    <>
      <SEOHead title={`${service.title} — Hyvoxa Smart Home Services`} description={service.metaDescription} />

      {/* Hero */}
      <section className="relative overflow-hidden bg-gunmetal-800 pt-32 pb-24 text-linen-100">
        <GradientMesh />
        <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
        <div className="relative mx-auto max-w-7xl px-5 lg:px-8">
          <button
            onClick={() => onNavigate('/services')}
            className="group inline-flex items-center gap-2 text-sm text-linen-400 transition-colors hover:text-tea-300"
          >
            <ArrowLeft className="h-4 w-4 transition-transform group-hover:-translate-x-1" />
            All Services
          </button>
          <div className="mt-8 grid items-center gap-12 lg:grid-cols-2">
            <div>
              <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-amaranth-600/20 text-tea-300 ring-1 ring-tea-300/20">
                <Icon className="h-7 w-7" />
              </div>
              <span className="mt-5 block text-xs font-bold uppercase tracking-[0.2em] text-tea-300">
                {service.tagline}
              </span>
              <h1 className="mt-3 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
                {service.title}
              </h1>
              <p className="mt-5 max-w-xl text-lg leading-relaxed text-linen-300 text-pretty">
                {service.intro}
              </p>
              <button
                onClick={() => onNavigate('/contact')}
                className="mt-8 inline-flex items-center gap-2 rounded-full bg-tea-300 px-6 py-3 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400 hover:shadow-xl hover:shadow-tea-400/30"
              >
                Get a Quote
                <ArrowRight className="h-4 w-4" />
              </button>
            </div>
            <div className="relative">
              <div className="overflow-hidden rounded-2xl shadow-2xl shadow-gunmetal-950/40 ring-1 ring-linen-100/10">
                <img
                  src={service.image}
                  alt={service.title}
                  className="aspect-[4/3] w-full object-cover"
                />
              </div>
              <div className="absolute -bottom-5 -left-5 hidden rounded-2xl bg-linen-100 p-5 shadow-xl sm:block">
                <div className="flex items-center gap-2 text-gunmetal-800">
                  <Icon className="h-5 w-5 text-amaranth-600" />
                  <span className="font-display font-semibold">{service.title}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Benefits */}
      <section className="bg-linen-100 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="mx-auto max-w-2xl text-center">
            <span className="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">Benefits</span>
            <h2 className="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">
              Why it transforms your home
            </h2>
          </div>
          <div className="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            {service.benefits.map((b, i) => {
              const reveal = useRevealClass<HTMLDivElement>(i * 80);
              return (
                <div
                  key={b.title}
                  ref={reveal.ref}
                  className={`group rounded-2xl border border-gunmetal-900/10 bg-white p-6 transition-all hover:border-amaranth-600/30 hover:shadow-lg ${reveal.className}`}
                >
                  <div className="font-display text-3xl font-bold text-amaranth-600/20 transition-colors group-hover:text-amaranth-600/40">
                    0{i + 1}
                  </div>
                  <h3 className="mt-3 font-display font-semibold text-gunmetal-800">{b.title}</h3>
                  <p className="mt-2 text-sm leading-relaxed text-gunmetal-500">{b.desc}</p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Features + Process */}
      <section className="bg-dust-300/40 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-16 lg:grid-cols-2">
            {/* Features */}
            <div>
              <span className="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">
                What is included
              </span>
              <h2 className="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">
                Capabilities &amp; components
              </h2>
              <ul className="mt-8 space-y-3">
                {service.features.map((f, i) => {
                  const reveal = useRevealClass<HTMLLIElement>(i * 60);
                  return (
                    <li
                      key={f}
                      ref={reveal.ref}
                      className={`flex items-start gap-3 rounded-xl bg-linen-100 px-5 py-3.5 shadow-sm transition-transform hover:translate-x-1 ${reveal.className}`}
                    >
                      <CheckCircle2 className="mt-0.5 h-5 w-5 flex-shrink-0 text-tea-600" />
                      <span className="text-gunmetal-700">{f}</span>
                    </li>
                  );
                })}
              </ul>
            </div>
            {/* Process */}
            <div>
              <span className="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">
                How we deliver
              </span>
              <h2 className="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">
                Our process
              </h2>
              <div className="mt-8 space-y-4">
                {service.process.map((p, i) => {
                  const reveal = useRevealClass<HTMLDivElement>(i * 80);
                  return (
                    <div
                      key={p.step}
                      ref={reveal.ref}
                      className={`group relative rounded-2xl border border-gunmetal-900/10 bg-white p-6 transition-all hover:border-tea-600/30 hover:shadow-md ${reveal.className}`}
                    >
                      <div className="flex items-center gap-3">
                        <span className="flex h-10 w-10 items-center justify-center rounded-xl bg-amaranth-600 font-display text-sm font-bold text-linen-100">
                          {p.step}
                        </span>
                        <h3 className="font-display font-semibold text-gunmetal-800">{p.title}</h3>
                      </div>
                      <p className="mt-3 pl-13 text-sm leading-relaxed text-gunmetal-500">{p.desc}</p>
                    </div>
                  );
                })}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* FAQ */}
      <section className="bg-linen-100 py-24">
        <div className="mx-auto max-w-3xl px-5 lg:px-8">
          <div className="text-center">
            <span className="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">FAQ</span>
            <h2 className="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">
              Common questions
            </h2>
          </div>
          <div className="mt-10 space-y-3">
            {service.faqs.map((faq, i) => (
              <FaqItem key={i} q={faq.q} a={faq.a} />
            ))}
          </div>
        </div>
      </section>

      {/* CTA + next service */}
      <section className="relative overflow-hidden bg-gunmetal-800 py-24 text-linen-100">
        <div className="absolute inset-0 bg-grid opacity-20" aria-hidden="true" />
        <div className="relative mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-8 lg:grid-cols-[1.5fr_1fr] lg:items-center">
            <div>
              <h2 className="font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">
                Ready to add {service.title.toLowerCase()} to your home?
              </h2>
              <p className="mt-4 max-w-xl text-lg text-linen-300 text-pretty">
                Reach out for a personalized consultation. We will assess your
                space and design a solution tailored to your needs.
              </p>
              <div className="mt-8 flex flex-wrap gap-4">
                <button
                  onClick={() => onNavigate('/contact')}
                  className="inline-flex items-center gap-2 rounded-full bg-tea-300 px-7 py-3.5 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400 hover:shadow-xl"
                >
                  Get a Consultation
                  <ArrowRight className="h-4 w-4" />
                </button>
                <a
                  href="mailto:hyvoxa@gmail.com"
                  className="inline-flex items-center gap-2 rounded-full border border-linen-100/20 px-7 py-3.5 font-semibold text-linen-100 transition-all hover:bg-linen-100/5"
                >
                  <Mail className="h-4 w-4" />
                  Email Us
                </a>
              </div>
            </div>
            <button
              onClick={() => onNavigate(`/services/${next.slug}`)}
              className="group rounded-2xl border border-linen-100/10 bg-gunmetal-900/40 p-6 text-left transition-all hover:border-tea-300/30 hover:bg-gunmetal-900/60"
            >
              <span className="text-xs text-linen-400">Next service</span>
              <h3 className="mt-1 font-display text-lg font-semibold text-linen-100 group-hover:text-tea-300 transition-colors">
                {next.title}
              </h3>
              <p className="mt-1 text-sm text-linen-400">{next.short}</p>
              <span className="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-tea-300">
                Continue
                <ArrowRight className="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" />
              </span>
            </button>
          </div>
        </div>
      </section>
    </>
  );
}

function FaqItem({ q, a }: { q: string; a: string }) {
  const [open, setOpen] = useState(false);
  const reveal = useRevealClass<HTMLDivElement>();
  return (
    <div
      ref={reveal.ref}
      className={`overflow-hidden rounded-xl border border-gunmetal-900/10 bg-white transition-shadow hover:shadow-md ${reveal.className}`}
    >
      <button
        onClick={() => setOpen((v) => !v)}
        className="flex w-full items-center justify-between gap-4 px-6 py-5 text-left"
      >
        <span className="font-display font-semibold text-gunmetal-800">{q}</span>
        <ChevronDown
          className={`h-5 w-5 flex-shrink-0 text-amaranth-600 transition-transform duration-300 ${open ? 'rotate-180' : ''}`}
        />
      </button>
      <div
        className={`grid transition-all duration-300 ${open ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'}`}
      >
        <div className="overflow-hidden">
          <p className="px-6 pb-5 text-sm leading-relaxed text-gunmetal-500">{a}</p>
        </div>
      </div>
    </div>
  );
}
