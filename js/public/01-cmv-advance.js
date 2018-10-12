var cmv_advance = {

	init: function() {

		cmv_advance.tabs.init();

	},

	tabs: {

		init: function() {

			cmv_advance.tabs.make_tabs();

		},

		make_tabs: function() {

			jQuery('.cmv-tabs').tabs();

		}
	}
}

cmv_advance.init();
