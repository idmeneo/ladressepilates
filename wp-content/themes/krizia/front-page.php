<?php
/**
 * Front page template.
 *
 * @package WP_Bootstrap_Starter
 */

get_header();

$krizia_asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/';
?>
			</div><!-- .row -->
		</div><!-- .container -->

		<main id="primary" class="site-main krizia-front" role="main">
			<section class="kf-hero d-flex align-items-center justify-content-center text-white text-center" style="background-image: linear-gradient(90deg, rgba(53, 40, 31, 0.64) 0%, rgba(53, 40, 31, 0.5) 50%, rgba(53, 40, 31, 0.28) 100%), url('<?php echo esc_url( $krizia_asset_uri . 'hero-reformer.jpg' ); ?>');">
				<div class="container-fluid px-3 px-md-5">
					<div class="row justify-content-center justify-content-lg-start">
						<div class="col-12 col-lg-6">
							<h1 class="kf-hero-title mb-4">L&rsquo;Adresse</h1>
							<p class="kf-hero-label mb-4">Pilates</p>
							<span class="kf-hero-mark d-inline-block mb-4" aria-hidden="true"></span>
							<h2 class="kf-hero-heading mb-4">Le Pilates sur-mesure</h2>
							<p class="kf-hero-subtitle mx-auto mb-5">L&rsquo;Adresse Pilates est un lieu d&eacute;di&eacute; &agrave; une pratique du Pilates,<br class="d-none d-md-block"> o&ugrave; chaque personne b&eacute;n&eacute;ficie d&rsquo;une attention r&eacute;elle<br class="d-none d-md-block"> et d&rsquo;un accompagnement sur-mesure.</p>
							<a class="btn kf-button kf-button--hero" href="#reservation">R&eacute;server ma s&eacute;ance</a>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--studio" id="studio">
				<div class="container kf-container text-center">
					<h2 class="kf-studio-title mb-4">Le studio</h2>
					<div class="row no-gutters justify-content-center align-items-stretch kf-studio-gallery mx-auto kf-studio-gallery-spacing">
						<div class="col-6 col-md-5 col-lg-4 px-2">
							<img src="<?php echo esc_url( $krizia_asset_uri . 'studio-main.jpg' ); ?>" alt="Salle de pilates avec reformers" class="img-fluid kf-studio-image">
						</div>
						<div class="col-6 col-md-5 col-lg-4 px-2">
							<img src="<?php echo esc_url( $krizia_asset_uri . 'reformer-detail.jpg' ); ?>" alt="Detail d'un reformer en bois" class="img-fluid kf-studio-image">
						</div>
					</div>
					<p class="kf-text kf-studio-copy mx-auto mb-0">Lorem ipsum dolor sit amet consectetur. Eget velit non ipsum commodo quis mauris metus. Cursus praesent pellentesque ultricies eu nisi. Facilisi in est in at mollis eget. Nec amet viverra consectetur quis. Aliquam quisque urna mi enim lectus faucibus sit.</p>
				</div>
			</section>

			<div class="kf-private-oval-layer kf-private-oval-layer--left" aria-hidden="true">
				<div class="kf-private-oval kf-private-oval--left d-none d-lg-block">
					<img src="<?php echo esc_url( $krizia_asset_uri . 'reformer-portrait.png' ); ?>" alt="">
				</div>
			</div>
			<div class="kf-private-oval-layer kf-private-oval-layer--right" aria-hidden="true">
				<div class="kf-private-oval kf-private-oval--right d-none d-lg-block">
					<img src="<?php echo esc_url( $krizia_asset_uri . 'movement-detail.png' ); ?>" alt="">
				</div>
			</div>

			<section class="kf-section kf-section--private position-relative">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-6">
							<h2 class="kf-private-title">Les cours priv&eacute;s</h2>
							<p class="kf-private-kicker">La promesse d&rsquo;un accompagnement</p>
							<p class="kf-private-text mt-5 mb-0">La promesse d&rsquo;un accompagnement s&eacute;rieux, efficace et adapt&eacute; &agrave; chaque corps. Les cours priv&eacute;s offrent une prise en charge totalement individualis&eacute;e. Chaque s&eacute;ance repose sur une analyse du corps et une programmation &eacute;volutive, pens&eacute;e pour construire une progression durable. Ici, rien n&rsquo;est standardis&eacute; : <strong>chaque mouvement est ajust&eacute;, chaque s&eacute;ance est construite autour de vos besoins r&eacute;els.</strong></p>
							<p class="kf-private-text kf-private-text--small mt-5 mb-0">Les enseignants de L&rsquo;Adresse Pilates suivent une formation continue afin de maintenir un haut niveau d&rsquo;exigence et de pr&eacute;cision dans leur pratique.</p>
							<div class="kf-section-dot mx-auto mt-4" aria-hidden="true"></div>
						</div>
					</div>
					<div class="kf-images row d-lg-none justify-content-center mt-4">
						<div class="col-5">
							<div class="kf-oval kf-oval--left mx-auto kf-image-left">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'movement-detail.png' ); ?>" alt="Mouvement de pilates au sol">
							</div>
						</div>
						<div class="col-5">
							<div class="kf-oval kf-oval--right mx-auto kf-image-right">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'reformer-portrait.png' ); ?>" alt="Eleve allongee sur reformer">
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--courses position-relative" id="cours">
				<div class="container-fluid kf-courses-container px-4 px-xl-5">
					<div class="row justify-content-center text-center">
						<div class="col-12">
							<h2 class="kf-courses-title mb-5">Les formules</h2>
						</div>
					</div>
					<div class="kf-courses-swiper swiper">
						<div class="row justify-content-center kf-courses-row swiper-wrapper">
							<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 swiper-slide">
							<article class="card kf-course-card h-100 border-0 text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<h3 class="card-title">Visiteur</h3>
									<span class="kf-course-title-line" aria-hidden="true"></span>
									<p class="card-text kf-course-tagline">D&eacute;couvrir l&rsquo;Adresse Pilates</p>
									<span class="kf-course-separator" aria-hidden="true"></span>
									<span class="kf-course-line">3 cours priv&eacute;s</span>
									<span class="kf-price">285 &euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">M&rsquo;inscrire</a>
								</div>
							</article>
							</div>
							<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 swiper-slide">
							<article class="card kf-course-card kf-course-card--featured h-100 text-center">
								<span class="kf-course-badge">Coup de coeur</span>
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<h3 class="card-title">R&eacute;gulier</h3>
									<span class="kf-course-title-line" aria-hidden="true"></span>
									<p class="card-text kf-course-tagline">Prendre ses rep&egrave;res</p>
									<span class="kf-course-separator" aria-hidden="true"></span>
									<span class="kf-course-line">10 cours priv&eacute;s</span>
									<span class="kf-price">900 &euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">M&rsquo;inscrire</a>
								</div>
							</article>
							</div>
							<div class="col-12 col-md-6 col-lg-4 swiper-slide">
							<article class="card kf-course-card h-100 border-0 text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<h3 class="card-title">R&eacute;sident</h3>
									<span class="kf-course-title-line" aria-hidden="true"></span>
									<p class="card-text kf-course-tagline">Approfondir sa pratique</p>
									<span class="kf-course-separator" aria-hidden="true"></span>
									<span class="kf-course-line">20 cours priv&eacute;s</span>
									<span class="kf-price">1 700 &euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">M&rsquo;inscrire</a>
								</div>
							</article>
							</div>
						</div>
						<div class="kf-courses-pagination swiper-pagination d-lg-none" aria-hidden="true"></div>
					</div>
				</div>
			</section>

			<section class="kf-statement d-flex align-items-center text-center text-white" style="background-image: linear-gradient(90deg, rgba(44, 31, 24, 0.34), rgba(44, 31, 24, 0.58)), url('<?php echo esc_url( $krizia_asset_uri . 'pilates-extension.jpg' ); ?>');">
				<div class="container kf-container position-relative">
					<img class="kf-statement-logo" src="<?php echo esc_url( $krizia_asset_uri . 'logo-transparent.png' ); ?>" alt="" aria-hidden="true">
					<div class="kf-statement-content position-relative mx-auto">
						<p class="kf-statement-kicker mb-4">Le Pilate</p>
						<h2 class="kf-statement-title mx-auto mb-0">Un lieu d&eacute;di&eacute;<br>&agrave; une pratique<br>du Pilates</h2>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--practice" id="formation">
				<div class="container-fluid px-0">
					<div class="row no-gutters align-items-stretch kf-practice-row">
						<div class="col-12 col-lg-6 d-flex align-items-center">
							<div class="kf-practice-copy">
								<h2 class="kf-practice-title">Formation continue</h2>
								<p class="kf-practice-kicker">Un espace de transmission</p>
								<p class="kf-practice-text">Un espace de transmission pour les professionnels du mouvement. Les Rencontres de L&rsquo;Adresse Pilates sont des workshops destin&eacute;s aux professionnels du mouvement : enseignants, th&eacute;rapeutes, pr&eacute;parateurs physiques et praticiens. Chaque session explore une th&eacute;matique cibl&eacute;e li&eacute;e &agrave; la biom&eacute;canique, au contr&ocirc;le moteur ou &agrave; la p&eacute;dagogie du mouvement.</p>
								<p class="kf-practice-text kf-practice-text--objective"><strong>L&rsquo;objectif :</strong> transmettre des outils imm&eacute;diatement applicables en pratique clinique, sportive ou p&eacute;dagogique.</p>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<img src="<?php echo esc_url( $krizia_asset_uri . 'collective-class.jpg' ); ?>" alt="Cours collectif de pilates reformer" class="img-fluid kf-practice-image">
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--agenda pb-5" id="agenda">
				<div class="container kf-container">
					<div class="card kf-agenda-card border-0 mx-auto">
						<div class="card-body text-center">
							<img class="kf-agenda-logo mx-auto" src="<?php echo esc_url( $krizia_asset_uri . 'logo.png' ); ?>" alt="" aria-hidden="true">
							<h2 class="kf-agenda-title mb-4">Les prochaines rencontres</h2>
							<div class="kf-event-list text-left">
								<article class="row align-items-center py-4 border-bottom">
									<div class="col-4 col-md-3 text-center">
										<div class="kf-event-date"><strong>13</strong><span>sept</span><small>2026</small><em>14:00 - 16:00</em></div>
									</div>
									<div class="col-8 col-md-6">
										<h3>Pilates pour femmes enceintes</h3>
										<p class="kf-event-copy mb-2">Lorem ipsum dolor sit amet consectetur. Nunc justo neque dignissim lacus molestie et arcu. Tincidunt dignissim venenatis vitae ut sed amet vulputate.</p>
										<span class="kf-event-duration">Dur&eacute;e : 2h</span>
										<div class="kf-event-price d-md-none mt-2">220 &euro;</div>
									</div>
									<div class="col-9 offset-3 col-md-3 offset-md-0 mt-3 mt-md-0 ml-md-auto text-center kf-event-action">
										<div class="kf-event-price d-none d-md-block">220 &euro;</div>
										<a class="btn kf-button kf-button--brown" href="#reservation">M&rsquo;inscrire</a>
									</div>
								</article>
								<article class="row align-items-center py-4 border-bottom">
									<div class="col-4 col-md-3 text-center">
										<div class="kf-event-date"><strong>30</strong><span>oct</span><small>2026</small><em>14:00 - 16:00</em></div>
									</div>
									<div class="col-8 col-md-6">
										<h3>Pilates pour femmes enceintes</h3>
										<p class="kf-event-copy mb-2">Lorem ipsum dolor sit amet consectetur. Nunc justo neque dignissim lacus molestie et arcu. Tincidunt dignissim venenatis vitae ut sed amet vulputate.</p>
										<span class="kf-event-duration">Dur&eacute;e : 2h</span>
										<div class="kf-event-price d-md-none mt-2">220 &euro;</div>
									</div>
									<div class="col-9 offset-3 col-md-3 offset-md-0 mt-3 mt-md-0 ml-md-auto text-center kf-event-action">
										<div class="kf-event-price d-none d-md-block">220 &euro;</div>
										<a class="btn kf-button kf-button--brown" href="#reservation">M&rsquo;inscrire</a>
									</div>
								</article>
								<article class="row align-items-center py-4 border-bottom">
									<div class="col-4 col-md-3 text-center">
										<div class="kf-event-date"><strong>05</strong><span>juil</span><small>2027</small><em>14:00 - 16:00</em></div>
									</div>
									<div class="col-8 col-md-6">
										<h3>Pilates pour femmes enceintes</h3>
										<p class="kf-event-copy mb-2">Lorem ipsum dolor sit amet consectetur. Nunc justo neque dignissim lacus molestie et arcu. Tincidunt dignissim venenatis vitae ut sed amet vulputate.</p>
										<span class="kf-event-duration">Dur&eacute;e : 2h</span>
										<div class="kf-event-price d-md-none mt-2">220 &euro;</div>
									</div>
									<div class="col-9 offset-3 col-md-3 offset-md-0 mt-3 mt-md-0 ml-md-auto text-center kf-event-action">
										<div class="kf-event-price d-none d-md-block">220 &euro;</div>
										<a class="btn kf-button kf-button--brown" href="#reservation">M&rsquo;inscrire</a>
									</div>
								</article>
							</div>
							<a class="kf-mini-link mt-4" href="#agenda">Afficher +</a>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-quote-band d-flex align-items-center text-center text-white" style="background-image: linear-gradient(rgba(50, 35, 27, 0.44), rgba(50, 35, 27, 0.44)), url('<?php echo esc_url( $krizia_asset_uri . 'studio-wide.jpg' ); ?>');">
				<div class="container kf-container">
					<ul class="kf-quote-equipment list-unstyled d-flex flex-wrap justify-content-center mb-5">
						<li>Reformer</li>
						<li>Cadillac</li>
						<li>Chair</li>
						<li>Barrel</li>
					</ul>
					<p class="kf-quote-text mx-auto mb-0">Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.</p>
				</div>
			</section>

			<section class="kf-section kf-section--team" id="equipe">
				<div class="container kf-container text-center">
					<h2 class="kf-team-title">Formateurs</h2>
					<p class="kf-team-kicker">La promesse d&rsquo;un accompagnement</p>
					<div class="row justify-content-center kf-team-grid">
						<div class="col-10 col-sm-4 col-lg-3 mb-4 mb-sm-0">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-amelie.jpg' ); ?>" alt="Portrait d'Amelie, formatrice pilates" class="img-fluid">
							</article>
						</div>
						<div class="col-10 col-sm-4 col-lg-3 mb-4 mb-sm-0">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-elise.jpg' ); ?>" alt="Portrait d'Elise, formatrice pilates" class="img-fluid">
							</article>
						</div>
						<div class="col-10 col-sm-4 col-lg-3">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-marc.jpg' ); ?>" alt="Portrait de Marc, formateur pilates" class="img-fluid">
							</article>
						</div>
					</div>
					<p class="kf-team-copy mx-auto mb-0 mt-4">Lorem ipsum dolor sit amet consectetur. Eget velit non ipsum commodo quis mauris metus. Cursus praesent pellentesque ultricies eu nisi. Facilisi in est in at mollis eget. Nec amet viverra consectetur quis. Aliquam quisque urna mi enim lectus faucibus sit.</p>
				</div>
			</section>

			<section class="kf-section kf-section--faq" id="questions">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-7">
							<h2 class="kf-faq-title">Vos questions</h2>
							<p class="kf-faq-kicker">La promesse d&rsquo;un accompagnement</p>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-lg-8">
							<div class="accordion kf-faq-accordion" id="kfFaq">
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingOne">
										<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#kfFaqOne" aria-expanded="true" aria-controls="kfFaqOne">Puis-je faire du pilates en &eacute;tant enceinte ?</button>
									</div>
									<div id="kfFaqOne" class="collapse show" aria-labelledby="kfFaqHeadingOne" data-parent="#kfFaq">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur. Feugiat consequat in sed iaculis vestibulum. Eget mauris nullam et sagittis lorem eu cursus. Feugiat dignissim vitae elit ut quam ut ornare at iaculis. Tincidunt tincidunt lacinia in in.</p>
											<p>Nulla aliquet gravida vitae at malesuada rutrum. Fermentum placerat sit nec faucibus vulputate placerat posuere. Arcu dui vel id tristique dolor. Morbi tellus eu semper amet elit curabitur eget. Lectus semper tellus velit quisque sollicitudin. Imperdiet mattis eget ut vulputate vulputate ut leo nam magna. In at semper mauris egestas. Nulla maecenas scelerisque parturient dolor sollicitudin morbi. Massa neque elit condimentum interdum fermentum commodo orci praesent nam. Aliquam magna sed nec quisque. Fringilla ultrices amet ut egestas euismod quis. Imperdiet ac risus mauris id sed iaculis orci. Enim egestas volutpat at adipiscing senectus iaculis. Scelerisque quis malesuada faucibus sollicitudin in feugiat ut.</p>
										</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingTwo">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqTwo" aria-expanded="false" aria-controls="kfFaqTwo">Puis-je faire du pilates en &eacute;tant enceinte ?</button>
									</div>
									<div id="kfFaqTwo" class="collapse" aria-labelledby="kfFaqHeadingTwo" data-parent="#kfFaq">
										<div class="card-body">Les cours sont adaptes selon le stade de grossesse, les recommandations medicales et les sensations du jour.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingThree">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqThree" aria-expanded="false" aria-controls="kfFaqThree">Puis-je faire du pilates en &eacute;tant enceinte ?</button>
									</div>
									<div id="kfFaqThree" class="collapse" aria-labelledby="kfFaqHeadingThree" data-parent="#kfFaq">
										<div class="card-body">Un premier rendez-vous permet de choisir entre pratique privee, formule reguliere ou atelier specialise.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingFour">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqFour" aria-expanded="false" aria-controls="kfFaqFour">Puis-je faire du pilates en &eacute;tant enceinte ?</button>
									</div>
									<div id="kfFaqFour" class="collapse" aria-labelledby="kfFaqHeadingFour" data-parent="#kfFaq">
										<div class="card-body">La reservation se confirme avec le studio apres votre demande via le formulaire.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--values">
				<div class="container kf-container text-center">
					<h2 class="kf-values-title">Guide &amp; conseils</h2>
					<p class="kf-values-kicker">La promesse d&rsquo;un accompagnement</p>
					<div class="row justify-content-center kf-values-grid">
						<div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'hands-detail.jpg' ); ?>" alt="Detail de mains en mouvement" class="img-fluid">
								<h3>Se soigner<br>gr&acirc;ce au Pilate</h3>
								<p>Lorem ipsum dolor sit amet consectetur. Commodo purus nibh amet facilisi lobortis vitae eu lkoresmeak ...</p>
								<a href="#reservation" class="kf-read-link">Lire la suite</a>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'chair-class.jpg' ); ?>" alt="Pratique pilates sur appareil" class="img-fluid">
								<h3>Continuer le Pilate<br>&agrave; la maison</h3>
								<p>Lorem ipsum dolor sit amet consectetur. Commodo purus nibh amet facilisi lobortis vitae eu lkoresmeak ...</p>
								<a href="#reservation" class="kf-read-link">Lire la suite</a>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-4">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'outdoor-portrait.jpg' ); ?>" alt="Portrait souriant apres une seance" class="img-fluid">
								<h3>10 conseils pour<br>commencer</h3>
								<p>Lorem ipsum dolor sit amet consectetur. Commodo purus nibh amet facilisi lobortis vitae eu lkoresmeak ...</p>
								<a href="#reservation" class="kf-read-link">Lire la suite</a>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-newsletter d-flex align-items-center text-white" style="background-image: linear-gradient(90deg, rgba(38, 27, 20, 0.48), rgba(38, 27, 20, 0.14)), url('<?php echo esc_url( $krizia_asset_uri . 'studio-reception.jpg' ); ?>');">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-8">
							<p class="kf-newsletter-title">Newsletter</p>
							<p class="kf-newsletter-copy mx-auto mt-4">Inscrivez-vous pour &ecirc;tre inform&eacute;(e) en avant-premi&egrave;re des lancements exclusifs, des actualit&eacute;s et des offres.</p>
							<form class="kf-newsletter-form form-inline justify-content-center" action="#" method="post">
								<label class="screen-reader-text" for="kf-newsletter-email">Email</label>
								<input id="kf-newsletter-email" class="form-control kf-newsletter-input" type="email" name="newsletter_email" placeholder="Votre email">
								<button class="btn kf-button kf-button--brown" type="submit">M&rsquo;inscrire</button>
							</form>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-contact" id="reservation">
				<div class="container kf-container">
					<div class="row justify-content-between align-items-start">
						<div class="col-12 col-lg-5 mb-5 mb-lg-0">
							<div class="kf-contact-info h-100 d-flex flex-column">
								<h2 class="kf-contact-title">Nous contacter</h2>
								<div class="kf-contact-brand d-flex align-items-center">
									<img class="kf-contact-logo" src="<?php echo esc_url( $krizia_asset_uri . 'logo-white.png' ); ?>" alt="L'Adresse Pilates">
									<div class="kf-contact-details">
										<h3>L&rsquo;Adresse Pilates</h3>
										<p>44 rue Poussin,<br>75016 Paris</p>
										<p><a href="tel:+33146721894">01 46 72 18 94</a><br><a href="mailto:contact@ladressepilates.fr">contact@ladressepilates.fr</a></p>
									</div>
								</div>
								<a class="btn kf-button kf-button--outline kf-contact-booking" href="#studio">R&eacute;server une s&eacute;ance</a>
								<div class="kf-contact-social">
									<p>Retrouvez-nous sur :</p>
									<a href="https://www.instagram.com/ladressepilates" target="_blank" rel="noopener">
										<span class="kf-instagram-icon" aria-hidden="true"></span>
										@ladressepilates
									</a>
								</div>
								<p class="kf-contact-copyright d-none d-lg-block">&copy; 2026 L&rsquo;Adresse Pilates. Tous droits r&eacute;serv&eacute;s.</p>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<form class="kf-form" action="#" method="post">
								<p class="kf-form-required">*Champs obligatoires</p>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-name">Nom</label>
									<input id="kf-name" class="form-control" type="text" name="name" placeholder="Nom*">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-firstname">Pr&eacute;nom</label>
									<input id="kf-firstname" class="form-control" type="text" name="firstname" placeholder="Pr&eacute;nom*">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-email">Email</label>
									<input id="kf-email" class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-phone">T&eacute;l&eacute;phone</label>
									<input id="kf-phone" class="form-control" type="tel" name="phone" placeholder="T&eacute;l&eacute;phone">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-message">Commentaire</label>
									<textarea id="kf-message" class="form-control" name="message" rows="5" placeholder="Commentaire"></textarea>
								</div>
								<button class="btn kf-button kf-button--outline" type="submit">Envoyer le message</button>
								<p class="kf-copyright d-lg-none mt-4">&copy; 2026 L&rsquo;Adresse Pilates. Tous droits r&eacute;serv&eacute;s.</p>
							</form>
						</div>
					</div>
				</div>
			</section>
		</main>

		<div class="container">
			<div class="row">
<?php
get_footer();
