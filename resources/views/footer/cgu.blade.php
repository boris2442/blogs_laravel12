@extends('layouts.website.app')
@section('title', 'Conditions d\'utilisation boris tech')
@section('content')
<section class="py-12 px-6 md:px-20 antialiased bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl md:text-4xl font-bold mb-8 text-center">Conditions Générales d’Utilisation</h1>

        <p class="mb-6 italic text-sm text-gray-500 dark:text-gray-400 text-center">
            Date de mise à jour :  {{
        \Carbon\Carbon::now()->subDay()->format('d F Y') }}
        </p>

        <div class="space-y-8 text-[16px] leading-relaxed">
            <div>
                <h2 class="text-2xl font-semibold mb-2">1. Objet du site</h2>
                <p>BorisTech est un blog dédié à la technologie, au développement web, au design numérique et à
                    l'actualité du monde digital. Il a pour but d’informer, de former et d’inspirer.</p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">2. Accès au site</h2>
                <p>L'accès au site est gratuit. Toutefois, certains contenus peuvent nécessiter une inscription.
                    L’utilisateur s’engage à fournir des informations exactes lors de son inscription et à maintenir la
                    confidentialité de ses identifiants.</p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">3. Propriété intellectuelle</h2>
                <p>Tous les contenus (articles, images, codes, logos) publiés sur BorisTech sont protégés par le droit
                    d’auteur. Toute reproduction, diffusion ou modification sans autorisation est interdite.</p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">4. Responsabilité</h2>
                <p>BorisTech s’efforce de fournir des informations exactes. Toutefois, il ne peut garantir l’absence
                    totale d’erreurs. L'utilisateur est seul responsable de l’usage qu’il fait des informations du site.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">5. Commentaires des utilisateurs</h2>
                <p>Les commentaires doivent rester respectueux. Tout message à caractère haineux, raciste, diffamatoire
                    ou publicitaire sera supprimé, et l’auteur pourra être banni du site.</p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">6. Données personnelles</h2>
                <p>Certaines données peuvent être collectées (nom, email, etc.) lors de l’inscription ou via des
                    formulaires. Elles sont utilisées uniquement dans le cadre du blog. Aucune information ne sera
                    vendue ou partagée sans votre accord.
                    <br>Voir notre <a href="{{ route('privacy.policy') }}"
                        class="text-blue-600 dark:text-blue-400 underline">Politique de confidentialité</a> pour plus de
                    détails.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">7. Modifications des CGU</h2>
                <p>BorisTech se réserve le droit de modifier ces CGU à tout moment. L’utilisateur est invité à les
                    consulter régulièrement.</p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">8. Droit applicable</h2>
                <p>Les présentes conditions sont régies par le droit camerounais. En cas de litige, les tribunaux
                    compétents seront ceux de Douala.</p>
            </div>
        </div>
    </div>
</section>
@endsection