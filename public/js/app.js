function showPendingNotifications() {
	if (typeof app.currentNotifications === 'undefined') {
		return;
	}
	
	for (let notif of app.currentNotifications) {
		var bgcol;
		switch (notif.type) {
			case 'info':
				bgcol = '#209cee';
				break;
			case 'success':
				bgcol = '#23d160';
				break;
			case 'warning':
				bgcol = '#e3c037';
				break;
		}
		
		Toastify({
			text: notif.message,
			duration: notif.duration,
			backgroundColor: bgcol
		}).showToast();
	}
}

document.addEventListener('DOMContentLoaded', function() {
	showPendingNotifications();
}, false);