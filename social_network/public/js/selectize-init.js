/* -----------------------------
 * Top Search bar function
 * Script file: selectize.min.js
 * Documentation about used plugin:
 * https://github.com/selectize/selectize.js
 * ---------------------------*/


$(document).ready(function () {
	var topUserSearch = $('.js-user-search');

	if (topUserSearch.length) {
		topUserSearch.selectize({
			persist: false,
			maxItems: 2,
			valueField: 'name',
			labelField: 'name',
			searchField: ['name'],
			options: [
				{image: 'images/avatar30-sm.jpg', name: 'Marie Claire Stevens', message:'12 Friends in Common', icon:'olymp-happy-face-icon'},
				{image: 'images/avatar54-sm.jpg', name: 'Marie Davidson', message:'4 Friends in Common', icon:'olymp-happy-face-icon'},
				{image: 'images/avatar49-sm.jpg', name: 'Marina Polson', message:'Mutual Friend: Mathilda Brinker', icon:'olymp-happy-face-icon'},
				{image: 'images/avatar36-sm.jpg', name: 'Ann Marie Gibson', message:'New York, NY', icon:'olymp-happy-face-icon'},
				{image: 'images/avatar22-sm.jpg', name: 'Dave Marinara', message:'8 Friends in Common', icon:'olymp-happy-face-icon'},
				{image: 'images/avatar41-sm.jpg', name: 'The Marina Bar', message:'Restaurant / Bar', icon:'olymp-star-icon'}
			],
			render: {
				option: function(item, escape) {
					return '<div class="inline-items">' +
						(item.image ? '<div class="author-thumb"><images src="' + escape(item.image) + '" alt="avatar"></div>' : '') +
						'<div class="notification-event">' +
						(item.name ? '<span class="h6 notification-friend"></a>' + escape(item.name) + '</span>' : '') +
						(item.message ? '<span class="chat-message-item">' + escape(item.message) + '</span>' : '') +
						'</div>'+
						(item.icon ? '<span class="notification-icon"><svg class="' + escape(item.icon) + '"><use xlink:href="icons/icons.svg#' + escape(item.icon) + '"></use></svg></span>' : '') +
						'</div>';
				},
				item: function(item, escape) {
					var label = item.name;
					return '<div>' +
						'<span class="label">' + escape(label) + '</span>' +
						'</div>';
				}
			}
		});
	}
});
