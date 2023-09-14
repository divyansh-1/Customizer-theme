<?php
/**
 * The template for displaying the footer
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
<footer>
	<div class="container">
		<div class="row">

			<div class="col-sm-12 col-md-3">
				<div class="Footer-logo">
					<img class="img-fluid" src="<?php bloginfo('template_url'); ?>/img/logo.png">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam condimentum massa luctus
						convallis ut non nisl. </p>
					<ul>
						<li>
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
					</ul>

				</div>
			</div>

			<div class="col-sm-12 col-md-3">
				<div class="Footer-menu">
					<h6>Important Links</h6>
					<ul>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Practice Areas</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Attorneys</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Pages</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Blog</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Documentation</a></li>
					</ul>
				</div>
			</div>

			<div class="col-sm-12 col-md-3">
				<div class="Footer-menu">
					<h6>Practice Areas</h6>
					<ul class="column-2">
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"> Family Law</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"> Criminal Law</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"> Medical Law</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"> Business Law</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"> Insurance Law</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"> Gun Crimes Law</a> </li>
					</ul>
				</div>
			</div>

			<div class="col-sm-12 col-md-3">
				<div class="Footer-contact">
					<h6>Contact us</h6>
					<ul>
						<li>
							<a href="#">PO Box 12345 Lorem ipsum <br> Lorem state</a>
						</li>
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i>
							<a href="#">+(000) 111-222-9999</a>
						</li>
						<li>
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<a href="#">info@lawgroup.com </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="copyright">
					<p>Lawgroup © All Rights Reserved 2022</p>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script>


<script>
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 20,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			700: {
				items: 1
			},
			1100: {
				items: 2
			}
		}
	})
</script>
<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
</script>
<script type="text/javascript">
	const faq = document.querySelector(".faq");
	const tabs = [...faq.querySelectorAll("nav .tab")];
	const content = [...faq.querySelectorAll(".content p")];

	tabs.forEach((tab) =>
		tab.addEventListener("click", (e) => {
			for (p of content) p.classList.remove("active");
			for (tab of tabs) tab.classList.remove("active");
			const index = tabs.indexOf(e.target);
			if (index != -1) {
				e.target.classList.add("active");
				content[index].classList.add("active");
			}
		})
	);
</script>

<script type="text/javascript">
	window.onload = function () {
		// Variables
		var tabLinks = document.querySelectorAll(".services-tab__link-item");
		var tabContents = document.querySelectorAll(".services-tab__tab-item");

		// Loop through the tab link
		for (var i = 0; i < tabLinks.length; i++) {
			tabLinks[i].addEventListener("click", function (e) {
				e.preventDefault();
				var id = this.hash.replace("#", "");

				// Loop through the tab content
				for (var j = 0; j < tabContents.length; j++) {
					var tabContent = tabContents[j];
					tabContent.classList.remove("is-visible");
					tabLinks[j].classList.remove("is-active");
					if (tabContent.id === id) {
						tabContent.classList.add("is-visible");

					}
				}

				this.classList.add("is-active");
			});
		}
	};

</script>

<script>
	$(document).ready(function () {
		var pTabItem = $(".prodNav .ptItem");
		$(pTabItem).click(function () {
			// Tab nav active functionality
			$(pTabItem).removeClass("active");
			$(this).addClass("active");

			// Tab container active functionality
			var tabid = $(this).attr("id");
			$(".prodMain").removeClass("active");
			$("#" + tabid + "C").addClass("active");

			return false;
		});
	});

</script>


<script>
	jQuery(document).ready(function ($) {
		var $win = $(window);
		$('.background').each(function () {
			var scroll_speed = 5;
			var $this = $(this);
			$(window).scroll(function () {
				var bgScroll = -(($win.scrollTop() - $this.offset().top) / scroll_speed);
				var bgPosition = 'center ' + bgScroll + 'px';
				$this.css('background-position', bgPosition);
			});
		});
	});
</script>


<script type="text/javascript">
	(function ($) {
		$.fn.menumaker = function (options) {
			var cssmenu = $(this), settings = $.extend({
				format: "dropdown",
				sticky: false
			}, options);
			return this.each(function () {
				$(this).find(".button").on('click', function () {
					$(this).toggleClass('menu-opened');
					var mainmenu = $(this).next('ul');
					if (mainmenu.hasClass('open')) {
						mainmenu.slideToggle().removeClass('open');
					}
					else {
						mainmenu.slideToggle().addClass('open');
						if (settings.format === "dropdown") {
							mainmenu.find('ul').show();
						}
					}
				});
				cssmenu.find('li ul').parent().addClass('has-sub');
				multiTg = function () {
					cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
					cssmenu.find('.submenu-button').on('click', function () {
						$(this).toggleClass('submenu-opened');
						if ($(this).siblings('ul').hasClass('open')) {
							$(this).siblings('ul').removeClass('open').slideToggle();
						}
						else {
							$(this).siblings('ul').addClass('open').slideToggle();
						}
					});
				};
				if (settings.format === 'multitoggle') multiTg();
				else cssmenu.addClass('dropdown');
				if (settings.sticky === true) cssmenu.css('position', 'fixed');
				resizeFix = function () {
					var mediasize = 991;
					if ($(window).width() > mediasize) {
						cssmenu.find('ul').show();
					}
					if ($(window).width() <= mediasize) {
						cssmenu.find('ul').hide().removeClass('open');
					}
				};
				resizeFix();
				return $(window).on('resize', resizeFix);
			});
		};
	})(jQuery);

	(function ($) {
		$(document).ready(function () {
			$("#cssmenu").menumaker({
				format: "multitoggle"
			});
		});
	})(jQuery);
</script>


<script type="text/javascript">
	$(window).scroll(function () {

		if ($(window).scrollTop()) {
			$('header').addClass('sticky');


		}
		else {
			$('header').removeClass('sticky');

		}
	});
</script>



<script>
	(function ($) {
		$.fn.countTo = function (options) {
			options = options || {};

			return $(this).each(function () {
				// set options for current element
				var settings = $.extend(
					{},
					$.fn.countTo.defaults,
					{
						from: $(this).data("from"),
						to: $(this).data("to"),
						speed: $(this).data("speed"),
						refreshInterval: $(this).data("refresh-interval"),
						decimals: $(this).data("decimals")
					},
					options
				);

				// how many times to update the value, and how much to increment the value on each update
				var loops = Math.ceil(settings.speed / settings.refreshInterval),
					increment = (settings.to - settings.from) / loops;

				// references & variables that will change with each update
				var self = this,
					$self = $(this),
					loopCount = 0,
					value = settings.from,
					data = $self.data("countTo") || {};

				$self.data("countTo", data);

				// if an existing interval can be found, clear it first
				if (data.interval) {
					clearInterval(data.interval);
				}
				data.interval = setInterval(updateTimer, settings.refreshInterval);

				// initialize the element with the starting value
				render(value);

				function updateTimer() {
					value += increment;
					loopCount++;

					render(value);

					if (typeof settings.onUpdate == "function") {
						settings.onUpdate.call(self, value);
					}

					if (loopCount >= loops) {
						// remove the interval
						$self.removeData("countTo");
						clearInterval(data.interval);
						value = settings.to;

						if (typeof settings.onComplete == "function") {
							settings.onComplete.call(self, value);
						}
					}
				}

				function render(value) {
					var formattedValue = settings.formatter.call(self, value, settings);
					$self.html(formattedValue);
				}
			});
		};

		$.fn.countTo.defaults = {
			from: 0, // the number the element should start at
			to: 0, // the number the element should end at
			speed: 1000, // how long it should take to count between the target numbers
			refreshInterval: 100, // how often the element should be updated
			decimals: 0, // the number of decimal places to show
			formatter: formatter, // handler for formatting the value before rendering
			onUpdate: null, // callback method for every time the element is updated
			onComplete: null // callback method for when the element finishes updating
		};

		function formatter(value, settings) {
			return value.toFixed(settings.decimals);
		}
	})(jQuery);

	jQuery(function ($) {
		// custom formatting example
		$(".count-number").data("countToOptions", {
			formatter: function (value, options) {
				return value
					.toFixed(options.decimals)
					.replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
			}
		});

		// start all the timers
		$(".timer").each(count);

		function count(options) {
			var $this = $(this);
			options = $.extend({}, options || {}, $this.data("countToOptions") || {});
			$this.countTo(options);
		}
	});

</script>

<script>
	(function($, api) {
    api.controlConstructor['custom_multiple_images'] = api.Control.extend({
        ready: function() {
            var control = this;
            var container = this.container.find('.custom-multiple-images-container');
            var addButton = this.container.find('.add-image-button');

            addButton.on('click', function() {
                wp.media.editor.send.attachment = function(props, attachment) {
                    control.addImage(attachment.url);
                };
                wp.media.editor.open();
                return false;
            });

            container.on('click', '.remove-image-button', function() {
                $(this).parent().remove();
                control.updateValue();
            });
        },

        addImage: function(url) {
            var container = this.container.find('.custom-multiple-images-container');
            container.append('<div class="image-item"><img src="' + url + '" /><input type="text" class="image-url" value="' + url + '" /><button class="remove-image-button">Remove</button></div>');
            this.updateValue();
        },

        updateValue: function() {
            var images = [];
            this.container.find('.image-url').each(function() {
                images.push($(this).val());
            });
            this.setting.set(images);
        }
    });
})(jQuery, wp.customize);

</script>



<?php wp_footer(); ?>
</body>

</html>