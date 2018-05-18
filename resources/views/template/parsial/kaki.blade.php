	<!-- jQuery CDN -->
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<!-- Bootstrap Js CDN -->
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- jQuery Custom Scroller CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- Kontak -->
	<script src="js/kontak.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#sidebar").mCustomScrollbar({
				theme: "minimal"
			});

			$('#sidebarCollapse').on('click', function () {
				$('#sidebar, #content').toggleClass('active');
				$('.collapse.in').toggleClass('in');
				$('a[aria-expanded=true]').attr('aria-expanded', 'false');
			});

			$('.sidebar-list').on('click', 'li', function() {
				$('.sidebar-list li.active').removeClass('active');
				$(this).addClass('active');
			});
		});
	</script>