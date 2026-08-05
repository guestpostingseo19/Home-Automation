import { SEOHead } from '@/components/SEOHead';
import { GradientMesh } from '@/components/Visuals';
import { useRevealClass } from '@/hooks/useReveal';
import { services, site } from '@/lib/data';
import {
  ArrowRight,
  Lightbulb,
  Thermometer,
  ShieldCheck,
  Clapperboard,
  Mic,
  Trees,
  Cpu,
  CheckCircle2,
} from 'lucide-react';

const iconMap: Record<string, typeof Lightbulb> = {
  Lightbulb,
  Thermometer,
  ShieldCheck,
  Clapperboard,
  Mic,
  Trees,
};

interface ServicesHubProps {
  onNavigate: (to: string) => void;
}

export function ServicesHubPage({ onNavigate }: ServicesHubProps) {
  return (
    <>
      <SEOHead
        title="Smart Home Automation Services — Hyvoxa"
        description="Explore Hyvoxa's full range of home automation services: intelligent lighting, climate control, security, entertainment, voice control and outdoor automation."
      />

      {/* Hero */}
      <section className="relative overflow-hidden bg-gunmetal-800 pt-32 pb-20 text-linen-100">
        <GradientMesh />
        <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
        <div className="relative mx-auto max-w-4xl px-5 text-center lg:px-8">
          <span className="inline-flex items-center gap-2 rounded-full border border-tea-300/30 bg-tea-300/10 px-4 py-1.5 text-xs font-medium text-tea-300">
            <Cpu className="h-3.5 w-3.5" />
            Our Services
          </span>
          <h1 className="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            Everything your home needs,
            <br />
            <span className="bg-gradient-to-r from-tea-300 to-amaranth-400 bg-clip-text text-transparent">
              intelligently connected
            </span>
          </h1>
          <p className="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            Six core services that can be deployed individually or woven into a
            single, unified smart home platform. Every solution is designed
            around your home and installed by certified professionals.
          </p>
        </div>
      </section>

      {/* Services grid */}
      <section className="bg-linen-100 py-24">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            {services.map((s, i) => {
              const Icon = iconMap[s.icon] ?? Cpu;
              const reveal = useRevealClass<HTMLButtonElement>(i * 80);
              return (
                <button
                  key={s.slug}
                  ref={reveal.ref}
                  onClick={() => onNavigate(`/services/${s.slug}`)}
                  className={`group flex flex-col overflow-hidden rounded-2xl bg-white text-left shadow-lg shadow-gunmetal-900/5 ring-1 ring-gunmetal-900/5 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gunmetal-900/15 ${reveal.className}`}
                >
                  <div className="relative h-56 overflow-hidden">
                    <img
                      src={s.image}
                      alt={s.title}
                      className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                      loading="lazy"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-gunmetal-900/60 to-transparent" />
                    <div className="absolute left-5 top-5 flex h-12 w-12 items-center justify-center rounded-xl bg-linen-100/90 text-amaranth-600 backdrop-blur transition-transform group-hover:scale-110">
                      <Icon className="h-6 w-6" />
                    </div>
                  </div>
                  <div className="flex flex-1 flex-col p-7">
                    <span className="text-xs font-bold uppercase tracking-wider text-amaranth-600">
                      {s.tagline}
                    </span>
                    <h2 className="mt-2 font-display text-xl font-semibold text-gunmetal-800">
                      {s.title}
                    </h2>
                    <p className="mt-2 flex-1 text-sm leading-relaxed text-gunmetal-500">
                      {s.short}
                    </p>
                    <ul className="mt-4 space-y-1.5">
                      {s.features.slice(0, 3).map((f) => (
                        <li key={f} className="flex items-start gap-2 text-sm text-gunmetal-600">
                          <CheckCircle2 className="mt-0.5 h-4 w-4 flex-shrink-0 text-tea-600" />
                          {f}
                        </li>
                      ))}
                    </ul>
                    <span className="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
                      Explore service
                      <ArrowRight className="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" />
                    </span>
                  </div>
                </button>
              );
            })}
          </div>
        </div>
      </section>

      {/* Process strip */}
      <section className="bg-gunmetal-800 py-20 text-linen-100">
        <div className="absolute inset-0 bg-grid opacity-20" aria-hidden="true" />
        <div className="relative mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-8 md:grid-cols-4">
            {site.process.map((p, i) => {
              const reveal = useRevealClass<HTMLDivElement>(i * 100);
              return (
                <div
                  key={p.step}
                  ref={reveal.ref}
                  className={`relative ${reveal.className}`}
                >
                  <div className="font-display text-4xl font-bold text-tea-300/40">{p.step}</div>
                  <h3 className="mt-2 font-display text-lg font-semibold text-linen-100">{p.title}</h3>
                  <p className="mt-1.5 text-sm leading-relaxed text-linen-400">{p.desc}</p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="relative overflow-hidden bg-amaranth-600 py-20">
        <div className="absolute inset-0 bg-grid opacity-20" aria-hidden="true" />
        <div className="relative mx-auto max-w-3xl px-5 text-center lg:px-8">
          <h2 className="font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">
            Not sure which services you need?
          </h2>
          <p className="mt-4 text-lg text-linen-200 text-pretty">
            Our consultation covers your whole home. We will recommend the right
            combination of services for your space, lifestyle and budget.
          </p>
          <button
            onClick={() => onNavigate('/contact')}
            className="mt-8 inline-flex items-center gap-2 rounded-full bg-linen-100 px-7 py-3.5 font-semibold text-amaranth-600 transition-all hover:bg-white hover:shadow-xl"
          >
            Book a Consultation
            <ArrowRight className="h-4 w-4" />
          </button>
        </div>
      </section>
    </>
  );
}
