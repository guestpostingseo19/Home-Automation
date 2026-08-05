import { SEOHead } from '@/components/SEOHead';
import { GradientMesh } from '@/components/Visuals';
import { useRevealClass } from '@/hooks/useReveal';
import { site } from '@/lib/data';
import {
  Mail,
  Phone,
  MapPin,
  Clock,
  ArrowRight,
  MessageCircle,
  CheckCircle2,
} from 'lucide-react';

interface ContactProps {
  onNavigate: (to: string) => void;
}

export function ContactPage({ onNavigate }: ContactProps) {
  const contactMethods = [
    {
      icon: Mail,
      label: 'Email Us',
      value: site.email,
      href: `mailto:${site.email}`,
      desc: 'The best way to reach us. We reply within one business day.',
    },
    {
      icon: Phone,
      label: 'Call Us',
      value: site.phone,
      href: `tel:${site.phone.replace(/[^0-9+]/g, '')}`,
      desc: 'Speak directly with our team during business hours.',
    },
    {
      icon: MapPin,
      label: 'Visit Us',
      value: site.address,
      href: '#',
      desc: 'Our showroom and office in Portland, Oregon.',
    },
  ];

  return (
    <>
      <SEOHead
        title="Contact Hyvoxa — Smart Home Consultations"
        description="Get in touch with Hyvoxa for smart home automation consultations, installations and support. Email hyvoxa@gmail.com or call us today."
      />

      {/* Hero */}
      <section className="relative overflow-hidden bg-gunmetal-800 pt-32 pb-20 text-linen-100">
        <GradientMesh />
        <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
        <div className="relative mx-auto max-w-4xl px-5 text-center lg:px-8">
          <span className="inline-flex items-center gap-2 rounded-full border border-tea-300/30 bg-tea-300/10 px-4 py-1.5 text-xs font-medium text-tea-300">
            <MessageCircle className="h-3.5 w-3.5" />
            Get in Touch
          </span>
          <h1 className="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            Let's talk about your
            <span className="block bg-gradient-to-r from-tea-300 to-amaranth-400 bg-clip-text text-transparent">
              intelligent home
            </span>
          </h1>
          <p className="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            Whether you are planning a full whole-home automation project or
            exploring a single service, we would love to hear from you. Reach
            out by email or phone and we will guide you from there.
          </p>
        </div>
      </section>

      {/* Contact methods */}
      <section className="bg-linen-100 py-20">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-6 md:grid-cols-3">
            {contactMethods.map((m, i) => {
              const reveal = useRevealClass<HTMLAnchorElement>(i * 80);
              const isLink = m.href !== '#';
              return (
                <a
                  key={m.label}
                  ref={reveal.ref}
                  href={m.href}
                  className={`group flex flex-col items-start rounded-2xl border border-gunmetal-900/10 bg-white p-8 transition-all duration-300 hover:border-amaranth-600/30 hover:shadow-xl ${reveal.className} ${isLink ? 'cursor-pointer' : 'cursor-default'}`}
                >
                  <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-amaranth-600/10 text-amaranth-600 transition-colors group-hover:bg-amaranth-600 group-hover:text-linen-100">
                    <m.icon className="h-7 w-7" />
                  </div>
                  <h2 className="mt-5 font-display text-lg font-semibold text-gunmetal-800">{m.label}</h2>
                  <p className="mt-1 text-base font-medium text-amaranth-600">{m.value}</p>
                  <p className="mt-3 text-sm leading-relaxed text-gunmetal-500">{m.desc}</p>
                </a>
              );
            })}
          </div>
        </div>
      </section>

      {/* Email CTA + info */}
      <section className="bg-dust-300/40 py-20">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="grid gap-12 lg:grid-cols-2 lg:items-center">
            {/* Email CTA */}
            <div className="rounded-2xl bg-gunmetal-800 p-8 text-linen-100 shadow-xl lg:p-12">
              <h2 className="font-display text-2xl font-bold sm:text-3xl text-balance">
                Email is the fastest way to reach us
              </h2>
              <p className="mt-4 text-base leading-relaxed text-linen-300 text-pretty">
                Send us a note with a few details about your home and what you
                are looking for. We will get back to you within one business day
                with next steps and availability for a consultation.
              </p>
              <div className="mt-6 space-y-3">
                {[
                  'Tell us about your property and location',
                  'Mention which services interest you',
                  'Share your timeline and any questions',
                ].map((tip) => (
                  <div key={tip} className="flex items-start gap-3 text-sm text-linen-200">
                    <CheckCircle2 className="mt-0.5 h-4 w-4 flex-shrink-0 text-tea-300" />
                    {tip}
                  </div>
                ))}
              </div>
              <a
                href={`mailto:${site.email}`}
                className="mt-8 inline-flex items-center gap-2 rounded-full bg-tea-300 px-7 py-3.5 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400 hover:shadow-xl hover:shadow-tea-400/30"
              >
                <Mail className="h-4 w-4" />
                {site.email}
                <ArrowRight className="h-4 w-4 transition-transform group-hover:translate-x-1" />
              </a>
            </div>

            {/* Business info */}
            <div>
              <h2 className="font-display text-2xl font-bold text-gunmetal-800 sm:text-3xl">
                Business hours &amp; location
              </h2>
              <div className="mt-8 space-y-6">
                <div className="flex gap-4">
                  <div className="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-linen-100 text-amaranth-600">
                    <Clock className="h-6 w-6" />
                  </div>
                  <div>
                    <h3 className="font-display font-semibold text-gunmetal-800">Hours</h3>
                    <p className="mt-1 text-sm leading-relaxed text-gunmetal-500">{site.hours}</p>
                  </div>
                </div>
                <div className="flex gap-4">
                  <div className="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-linen-100 text-amaranth-600">
                    <MapPin className="h-6 w-6" />
                  </div>
                  <div>
                    <h3 className="font-display font-semibold text-gunmetal-800">Office &amp; Showroom</h3>
                    <p className="mt-1 text-sm leading-relaxed text-gunmetal-500">{site.address}</p>
                  </div>
                </div>
                <div className="flex gap-4">
                  <div className="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-linen-100 text-amaranth-600">
                    <Phone className="h-6 w-6" />
                  </div>
                  <div>
                    <h3 className="font-display font-semibold text-gunmetal-800">Phone</h3>
                    <p className="mt-1 text-sm leading-relaxed text-gunmetal-500">{site.phone}</p>
                  </div>
                </div>
              </div>
              <div className="mt-8 rounded-xl bg-white p-5 ring-1 ring-gunmetal-900/5">
                <h3 className="font-display text-sm font-semibold text-gunmetal-800">
                  What happens after you reach out?
                </h3>
                <ol className="mt-3 space-y-2 text-sm text-gunmetal-500">
                  <li className="flex gap-2"><span className="font-semibold text-amaranth-600">1.</span> We reply within one business day to acknowledge your inquiry.</li>
                  <li className="flex gap-2"><span className="font-semibold text-amaranth-600">2.</span> We schedule a no-obligation consultation at your home.</li>
                  <li className="flex gap-2"><span className="font-semibold text-amaranth-600">3.</span> You receive a tailored proposal with scope and pricing.</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Map-like decorative section */}
      <section className="bg-linen-100 py-20">
        <div className="mx-auto max-w-7xl px-5 lg:px-8">
          <div className="relative overflow-hidden rounded-2xl bg-gunmetal-800 p-12 text-center text-linen-100">
            <div className="absolute inset-0 bg-grid opacity-30" aria-hidden="true" />
            <div className="relative">
              <MapPin className="mx-auto h-10 w-10 text-tea-300" />
              <h2 className="mt-4 font-display text-2xl font-bold sm:text-3xl">
                Serving the greater Portland area
              </h2>
              <p className="mx-auto mt-3 max-w-xl text-linen-300 text-pretty">
                Our team serves homes across the Portland metropolitan area and
                surrounding regions. Contact us to confirm we cover your
                location.
              </p>
              <button
                onClick={() => onNavigate('/services')}
                className="mt-6 inline-flex items-center gap-2 rounded-full border border-linen-100/20 px-6 py-3 font-semibold text-linen-100 transition-all hover:bg-linen-100/5"
              >
                Explore Our Services
                <ArrowRight className="h-4 w-4" />
              </button>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
