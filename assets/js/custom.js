/*
 * custom.js
 *
 * Place your code here that you need on all your pages.
 */

"use strict";

$(document).ready(function () {

	//===== Sidebar Search (Demo Only) =====//
	$('.sidebar-search').submit(function (e) {
		//e.preventDefault(); // Prevent form submitting (browser redirect)

		$('.sidebar-search-results').slideDown(200);
		return false;
	});

	$('.sidebar-search-results .close').click(function () {
		$('.sidebar-search-results').slideUp(200);
	});

	//===== .row .row-bg Toggler =====//
	$('.row-bg-toggle').click(function (e) {
		e.preventDefault(); // prevent redirect to #

		$('.row.row-bg').each(function () {
			$(this).slideToggle(200);
		});
	});

	//===== Sparklines =====//

	$("#sparkline-bar").sparkline('html', {
		type: 'bar',
		height: '35px',
		zeroAxis: false,
		barColor: App.getLayoutColorCode('red')
	});

	$("#sparkline-bar2").sparkline('html', {
		type: 'bar',
		height: '35px',
		zeroAxis: false,
		barColor: App.getLayoutColorCode('green')
	});

	//===== Refresh-Button on Widgets =====//

	$('.widget .toolbar .widget-refresh').click(function () {
		var el = $(this).parents('.widget');

		App.blockUI(el);
		window.setTimeout(function () {
			App.unblockUI(el);
			noty({
				text: '<strong>Widget updated.</strong>',
				type: 'success',
				timeout: 1000
			});
		}, 1000);
	});

	//===== Fade In Notification (Demo Only) =====//
	setTimeout(function () {
		$('#sidebar .notifications.demo-slide-in > li:eq(1)').slideDown(500);
	}, 3500);

	setTimeout(function () {
		$('#sidebar .notifications.demo-slide-in > li:eq(0)').slideDown(500);
	}, 7000);

	//===== Check User Login =====//

	$('.login-form').submit(function (e) {
		//e.preventDefault(); // Prevent form submitting (browser redirect)

		$('.sidebar-search-results').slideDown(200);
		return false;
	});

	$('login-form').on('change', function () {
		var state_id = $("#donor_state").val();
		if (state_id == "") {
			swal("Oopss!!!", "Please select State", "warning");
			return;
		}
		jQuery.post("get-city.php", {
			state_id: state_id
		}, function (data, textStatus) {
			console.log(data);
			console.log(JSON.parse(data));
			console.log(textStatus);
			var array = JSON.parse(data);
			var a = '<option value="">Select District/City</option>';
			for (var i = 0; i < array.length; i++) {
				a = a + "<option value=" + array[i].city_id + ">" + array[i].city_name + "</option>";
			}
			var b = "<select id='donor_city' name='donor_city' class='form-control'>" + a + "</select>";
			var c = $("#donor_city").html(b);
		});
	});
});