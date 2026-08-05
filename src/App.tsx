import { useHashRoute } from '@/lib/router';
import { Navbar, Footer, PageShell } from '@/components/Layout';
import { HomePage, CTASection } from '@/pages/HomePage';
import { ServicesHubPage } from '@/pages/ServicesHubPage';
import { ServiceDetailPage } from '@/pages/ServiceDetailPage';
import { BlogListPage } from '@/pages/BlogListPage';
import { BlogPostPage } from '@/pages/BlogPostPage';
import { AboutPage } from '@/pages/AboutPage';
import { ContactPage } from '@/pages/ContactPage';
import { LegalPageView } from '@/pages/LegalPageView';
import { services, blogPosts, legalPages } from '@/lib/data';
import { SEOHead } from '@/components/SEOHead';

function NotFound({ onNavigate }: { onNavigate: (to: string) => void }) {
  return (
    <>
      <SEOHead title="Page Not Found — Hyvoxa" description="The page you are looking for could not be found." />
      <section className="flex min-h-screen items-center justify-center bg-gunmetal-800 px-5 text-center text-linen-100">
        <div>
          <div className="font-display text-7xl font-bold text-tea-300">404</div>
          <h1 className="mt-4 font-display text-2xl font-bold">Page not found</h1>
          <p className="mt-3 text-linen-400">The page you are looking for does not exist or has moved.</p>
          <button
            onClick={() => onNavigate('/')}
            className="mt-8 inline-flex items-center gap-2 rounded-full bg-tea-300 px-6 py-3 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400"
          >
            Back to Home
          </button>
        </div>
      </section>
    </>
  );
}

function App() {
  const [route, navigate] = useHashRoute();

  const currentPath = (() => {
    switch (route.name) {
      case 'home': return '/';
      case 'services': return '/services';
      case 'service': return `/services/${route.slug}`;
      case 'blog': return '/blog';
      case 'post': return `/blog/${route.slug}`;
      case 'about': return '/about';
      case 'contact': return '/contact';
      case 'legal': return `/legal/${route.slug}`;
    }
  })();

  let content: React.ReactNode;

  switch (route.name) {
    case 'home':
      content = <HomePage onNavigate={navigate} />;
      break;
    case 'services':
      content = <ServicesHubPage onNavigate={navigate} />;
      break;
    case 'service': {
      const service = services.find((s) => s.slug === route.slug);
      content = service ? (
        <ServiceDetailPage service={service} onNavigate={navigate} />
      ) : <NotFound onNavigate={navigate} />;
      break;
    }
    case 'blog':
      content = <BlogListPage onNavigate={navigate} />;
      break;
    case 'post': {
      const post = blogPosts.find((p) => p.slug === route.slug);
      content = post ? (
        <BlogPostPage post={post} onNavigate={navigate} />
      ) : <NotFound onNavigate={navigate} />;
      break;
    }
    case 'about':
      content = <AboutPage onNavigate={navigate} />;
      break;
    case 'contact':
      content = <ContactPage onNavigate={navigate} />;
      break;
    case 'legal': {
      const page = legalPages.find((p) => p.slug === route.slug);
      content = page ? (
        <LegalPageView page={page} onNavigate={navigate} />
      ) : <NotFound onNavigate={navigate} />;
      break;
    }
    default:
      content = <NotFound onNavigate={navigate} />;
  }

  return (
    <PageShell>
      <Navbar current={currentPath} onNavigate={navigate} />
      <main className="flex-1">{content}</main>
      <Footer onNavigate={navigate} />
    </PageShell>
  );
}

export default App;
