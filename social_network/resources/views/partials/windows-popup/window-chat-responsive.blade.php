

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title" >Chat</h6>
			<div class="more">
{{--				<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>--}}
				<svg class="olymp-little-delete js-chat-close"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img src="{{asset('images/avatar14-sm.jpg')}}" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{asset('images/author-page.jpg')}}" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Don’t worry Mathilda!</span>
							<span class="chat-message-item">I already bought everything</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{asset('images/avatar14-sm.jpg')}}" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<form class="need-validation">
			<div class="form-group label-floating is-empty">
				<label class="control-label">Nhập tin nhắn...</label>
				<textarea class="form-control" placeholder="" id="messageContent"></textarea>
				<div class="add-options-message">
					<a href="#" class="options-message sendMessage">
						<svg class="olymp-computer-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
					</a>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->
