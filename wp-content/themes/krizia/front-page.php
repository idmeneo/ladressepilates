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

			<section class="kf-section kf-section--studio py-5" id="studio">
				<div class="container kf-container text-center">
					<h2 class="kf-studio-title mb-4">Le studio</h2>
					<div class="row no-gutters justify-content-center align-items-stretch kf-studio-gallery mx-auto mb-4">
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

			<section class="kf-section kf-section--private py-5 position-relative">
				<div class="kf-private-oval kf-private-oval--left d-none d-lg-block">
					<img src="<?php echo esc_url( $krizia_asset_uri . 'reformer-portrait.png' ); ?>" alt="Mouvement de pilates au sol">
				</div>
				<div class="kf-private-oval kf-private-oval--right d-none d-lg-block">
					<img src="<?php echo esc_url( $krizia_asset_uri . 'movement-detail.png' ); ?>" alt="Eleve allongee sur reformer">
				</div>
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
					<div class="row d-lg-none justify-content-center mt-4">
						<div class="col-5">
							<div class="kf-oval kf-oval--left mx-auto">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'movement-detail.png' ); ?>" alt="Mouvement de pilates au sol">
							</div>
						</div>
						<div class="col-5">
							<div class="kf-oval kf-oval--right mx-auto">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'reformer-portrait.png' ); ?>" alt="Eleve allongee sur reformer">
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--courses pb-5" id="cours">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-7">
							<p class="kf-section-kicker mb-2">Les formules</p>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-4 col-lg-3 mb-3 mb-md-0">
							<article class="card kf-course-card h-100 border-0 text-center">
								<div class="card-body d-flex flex-column align-items-center p-4">
									<h3 class="card-title text-uppercase">Visiteurs</h3>
									<p class="card-text kf-text mt-2">Decouverte L'Adresse Pilates</p>
									<span class="kf-course-line">1 cours prive</span>
									<span class="kf-price mt-auto mb-3">180&euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">Reserver</a>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3 mb-3 mb-md-0">
							<article class="card kf-course-card kf-course-card--featured h-100 text-center">
								<div class="card-body d-flex flex-column align-items-center p-4">
									<h3 class="card-title text-uppercase">Regulier</h3>
									<p class="card-text kf-text mt-2">Pilates en regle</p>
									<span class="kf-course-line">10 cours prives</span>
									<span class="kf-price mt-auto mb-3">900&euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">Reserver</a>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3">
							<article class="card kf-course-card h-100 border-0 text-center">
								<div class="card-body d-flex flex-column align-items-center p-4">
									<h3 class="card-title text-uppercase">Resident</h3>
									<p class="card-text kf-text mt-2">Approfondir sa pratique</p>
									<span class="kf-course-line">20 cours prives</span>
									<span class="kf-price mt-auto mb-3">1 700&euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">Reserver</a>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-statement d-flex align-items-center text-center text-white" style="background-image: linear-gradient(90deg, rgba(44, 31, 24, 0.34), rgba(44, 31, 24, 0.58)), url('<?php echo esc_url( $krizia_asset_uri . 'pilates-extension.jpg' ); ?>');">
				<div class="container kf-container">
					<p class="kf-section-kicker mb-2">L'Adresse</p>
					<h2 class="mx-auto mb-0">Un lieu dedie a une pratique du pilates</h2>
				</div>
			</section>

			<section class="kf-section kf-section--practice" id="formation">
				<div class="container-fluid px-0">
					<div class="row no-gutters justify-content-center align-items-stretch">
						<div class="col-12 col-lg-5 d-flex align-items-center">
							<div class="kf-practice-copy mx-auto">
								<p class="kf-section-kicker mb-2">Formation continue</p>
								<h2>Le stage de transmission</h2>
								<p class="kf-text mt-3 mb-0">Un espace de transmission pour les professeurs et les personnes qui souhaitent approfondir leur regard, leur ecoute et leur precision dans la pratique du Pilates.</p>
								<p class="kf-text mt-3 mb-0">L'objectif : transmettre des outils immediatement applicables en pratique clinique, sportive ou pedagogique.</p>
								<a class="kf-link mt-3" href="#reservation">Decouvrir les formations</a>
							</div>
						</div>
						<div class="col-12 col-lg-5">
							<img src="<?php echo esc_url( $krizia_asset_uri . 'collective-class.jpg' ); ?>" alt="Cours collectif de pilates reformer" class="img-fluid kf-practice-image">
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--agenda pb-5" id="agenda">
				<div class="container kf-container">
					<div class="card kf-agenda-card border-0 mx-auto">
						<div class="card-body text-center">
							<div class="kf-monogram mx-auto" aria-hidden="true">LA</div>
							<p class="kf-section-kicker mb-4">Les prochaines rencontres</p>
							<div class="kf-event-list text-left">
								<article class="row align-items-center py-4 border-bottom">
									<div class="col-3 col-md-2 text-center">
										<div class="kf-event-date"><strong>13</strong><span>Sept</span><em>Atelier</em></div>
									</div>
									<div class="col-9 col-md-6">
										<h3>Pilates pour femmes enceintes</h3>
										<p class="kf-text mb-0">Un atelier pour allier respiration, force juste et mobilite autour de la grossesse.</p>
									</div>
									<div class="col-3 col-md-1 offset-3 offset-md-0 mt-3 mt-md-0 kf-event-price">320&euro;</div>
									<div class="col-6 col-md-3 mt-3 mt-md-0 text-md-right">
										<a class="btn kf-button kf-button--brown" href="#reservation">S'inscrire</a>
									</div>
								</article>
								<article class="row align-items-center py-4 border-bottom">
									<div class="col-3 col-md-2 text-center">
										<div class="kf-event-date"><strong>30</strong><span>Oct</span><em>Atelier</em></div>
									</div>
									<div class="col-9 col-md-6">
										<h3>Pilates pour femmes enceintes</h3>
										<p class="kf-text mb-0">Une session pour construire des reperes simples et adapter chaque mouvement.</p>
									</div>
									<div class="col-3 col-md-1 offset-3 offset-md-0 mt-3 mt-md-0 kf-event-price">320&euro;</div>
									<div class="col-6 col-md-3 mt-3 mt-md-0 text-md-right">
										<a class="btn kf-button kf-button--brown" href="#reservation">S'inscrire</a>
									</div>
								</article>
								<article class="row align-items-center py-4">
									<div class="col-3 col-md-2 text-center">
										<div class="kf-event-date"><strong>05</strong><span>Juil</span><em>Atelier</em></div>
									</div>
									<div class="col-9 col-md-6">
										<h3>Pilates pour femmes enceintes</h3>
										<p class="kf-text mb-0">Un format pour apprendre, ajuster sa pratique et gagner en confiance.</p>
									</div>
									<div class="col-3 col-md-1 offset-3 offset-md-0 mt-3 mt-md-0 kf-event-price">320&euro;</div>
									<div class="col-6 col-md-3 mt-3 mt-md-0 text-md-right">
										<a class="btn kf-button kf-button--brown" href="#reservation">S'inscrire</a>
									</div>
								</article>
							</div>
							<a class="kf-mini-link mt-4" href="#agenda">Voir plus</a>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-quote-band d-flex align-items-center text-center text-white" style="background-image: linear-gradient(rgba(50, 35, 27, 0.44), rgba(50, 35, 27, 0.44)), url('<?php echo esc_url( $krizia_asset_uri . 'studio-wide.jpg' ); ?>');">
				<div class="container kf-container">
					<p class="mx-auto mb-0">Notre studio offre une experience raffinee, centree sur une pratique attentive, precise et accompagnee.</p>
				</div>
			</section>

			<section class="kf-section kf-section--team py-5" id="equipe">
				<div class="container kf-container text-center">
					<p class="kf-section-kicker mb-2">Formateurs</p>
					<h2 class="mb-1">Le premier de vos accompagnements</h2>
					<div class="row justify-content-center mt-4">
						<div class="col-8 col-sm-4 col-lg-2 mb-4 mb-sm-0">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-amelie.jpg' ); ?>" alt="Portrait d'Amelie, formatrice pilates" class="img-fluid">
							</article>
						</div>
						<div class="col-8 col-sm-4 col-lg-2 mb-4 mb-sm-0">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-elise.jpg' ); ?>" alt="Portrait d'Elise, formatrice pilates" class="img-fluid">
							</article>
						</div>
						<div class="col-8 col-sm-4 col-lg-2">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-marc.jpg' ); ?>" alt="Portrait de Marc, formateur pilates" class="img-fluid">
							</article>
						</div>
					</div>
					<p class="kf-text kf-text--narrow mx-auto mt-4 mb-0">Lorem ipsum dolor sit amet consectetur. Eget velit non quam commodo quis mauris mattis. Cum sociis praesent pellentesque ultricies eros.</p>
				</div>
			</section>

			<section class="kf-section kf-section--faq py-5" id="questions">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-7">
							<p class="kf-section-kicker mb-2">Vos questions</p>
							<h2 class="mb-4">Le premier de vos accompagnements</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-lg-8">
							<div class="accordion kf-faq-accordion" id="kfFaq">
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingOne">
										<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#kfFaqOne" aria-expanded="true" aria-controls="kfFaqOne">Pour qui faire du pilates en classe encadree ?</button>
									</div>
									<div id="kfFaqOne" class="collapse show" aria-labelledby="kfFaqHeadingOne" data-parent="#kfFaq">
										<div class="card-body">Lorem ipsum dolor sit amet consectetur. Eget velit non quam commodo quis mauris mattis. Curabitur imperdiet, mauris in rhoncus aliquam, accompagne chaque profil vers une progression claire. Nullam volutpat permet d'adapter les ressorts, les amplitudes et la respiration a chaque besoin.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingTwo">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqTwo" aria-expanded="false" aria-controls="kfFaqTwo">Pour se faire du pilates en etant enceinte ?</button>
									</div>
									<div id="kfFaqTwo" class="collapse" aria-labelledby="kfFaqHeadingTwo" data-parent="#kfFaq">
										<div class="card-body">Les cours sont adaptes selon le stade de grossesse, les recommandations medicales et les sensations du jour.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingThree">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqThree" aria-expanded="false" aria-controls="kfFaqThree">Pour se faire du pilates en etant enceinte ?</button>
									</div>
									<div id="kfFaqThree" class="collapse" aria-labelledby="kfFaqHeadingThree" data-parent="#kfFaq">
										<div class="card-body">Un premier rendez-vous permet de choisir entre pratique privee, formule reguliere ou atelier specialise.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingFour">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqFour" aria-expanded="false" aria-controls="kfFaqFour">Pour se faire du pilates en etant enceinte ?</button>
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

			<section class="kf-section kf-section--values py-5">
				<div class="container kf-container text-center">
					<p class="kf-section-kicker mb-2">Guide &amp; conseils</p>
					<h2 class="mb-4">Le premier de vos accompagnements</h2>
					<div class="row justify-content-center">
						<div class="col-12 col-md-4 col-lg-3 mb-4 mb-md-0">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'hands-detail.jpg' ); ?>" alt="Detail de mains en mouvement" class="img-fluid">
								<h3 class="mt-3">Le reformer selon le pilates</h3>
								<p class="kf-text mb-0">Comprendre les ressorts, les appuis et les reperes essentiels.</p>
								<a href="#reservation" class="kf-read-link">Lire la suite</a>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3 mb-4 mb-md-0">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'chair-class.jpg' ); ?>" alt="Pratique pilates sur appareil" class="img-fluid">
								<h3 class="mt-3">Continuer le pilates a la maison</h3>
								<p class="kf-text mb-0">Des routines simples pour garder une pratique reguliere.</p>
								<a href="#reservation" class="kf-read-link">Lire la suite</a>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'outdoor-portrait.jpg' ); ?>" alt="Portrait souriant apres une seance" class="img-fluid">
								<h3 class="mt-3">Le controle par la respiration</h3>
								<p class="kf-text mb-0">Un levier discret pour construire force et fluidite.</p>
								<a href="#reservation" class="kf-read-link">Lire la suite</a>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-newsletter d-flex align-items-center text-white" style="background-image: linear-gradient(90deg, rgba(38, 27, 20, 0.48), rgba(38, 27, 20, 0.14)), url('<?php echo esc_url( $krizia_asset_uri . 'studio-reception.jpg' ); ?>');">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-7">
							<p class="kf-section-kicker mb-2">Newsletter</p>
							<h2>Recevoir nos prochaines actualites</h2>
							<form class="form-inline justify-content-center mt-4" action="#" method="post">
								<label class="screen-reader-text" for="kf-newsletter-email">Email</label>
								<input id="kf-newsletter-email" class="form-control kf-newsletter-input" type="email" name="newsletter_email" placeholder="Votre email">
								<button class="btn kf-button kf-button--brown" type="submit">S'inscrire</button>
							</form>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-contact py-5" id="reservation">
				<div class="container kf-container">
					<div class="row justify-content-center">
						<div class="col-12 col-lg-4 mb-5 mb-lg-0">
							<div class="kf-contact-info">
								<p class="kf-section-kicker mb-4">Nous contacter</p>
								<div class="kf-monogram kf-monogram--light" aria-hidden="true">LA</div>
								<h2>L'Adresse Pilates</h2>
								<p>14 rue du Studio<br>75000 Paris</p>
								<p><a href="mailto:bonjour@ladresse-pilates.fr">bonjour@ladresse-pilates.fr</a><br><a href="tel:+33100000000">+33 1 00 00 00 00</a></p>
								<a class="btn kf-button kf-button--outline" href="#studio">Reserver une seance</a>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<form class="kf-form" action="#" method="post">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="screen-reader-text" for="kf-name">Nom</label>
											<input id="kf-name" class="form-control" type="text" name="name" placeholder="Nom">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="screen-reader-text" for="kf-firstname">Prenom</label>
											<input id="kf-firstname" class="form-control" type="text" name="firstname" placeholder="Prenom">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-email">Email</label>
									<input id="kf-email" class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-phone">Telephone</label>
									<input id="kf-phone" class="form-control" type="tel" name="phone" placeholder="Telephone">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-message">Commentaire</label>
									<textarea id="kf-message" class="form-control" name="message" rows="5" placeholder="Commentaire"></textarea>
								</div>
								<button class="btn kf-button kf-button--outline" type="submit">Envoyer le message</button>
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
