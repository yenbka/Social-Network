

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title chat-title-user-name" >Chat</h6>
			<div class="more">
				<svg class="olymp-little-delete js-chat-close"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">

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
