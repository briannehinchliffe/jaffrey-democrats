(function () {
	function initCountdown(block) {
		const targetStr = block.getAttribute('data-target-date');
		if (!targetStr) return;

		const target = new Date(targetStr).getTime();
		const daysEl = block.querySelector('.countdown-days');
		const hoursEl = block.querySelector('.countdown-hours');
		const minsEl = block.querySelector('.countdown-minutes');
		const secsEl = block.querySelector('.countdown-seconds');
		const timerEl = block.querySelector('.countdown-timer');
		const expiredEl = block.querySelector('.countdown-expired');

		function updateTimer() {
			const now = Date.now();
			const diff = Math.max(0, target - now);

			if (diff <= 0) {
				if (timerEl) timerEl.style.display = 'none';
				if (expiredEl) expiredEl.style.display = 'inline';
				return;
			}

			if (daysEl)
				daysEl.textContent = String(
					Math.floor(diff / 86400000)
				).padStart(2, '0');
			if (hoursEl)
				hoursEl.textContent = String(
					Math.floor((diff % 86400000) / 3600000)
				).padStart(2, '0');
			if (minsEl)
				minsEl.textContent = String(
					Math.floor((diff % 3600000) / 60000)
				).padStart(2, '0');
			if (secsEl)
				secsEl.textContent = String(
					Math.floor((diff % 60000) / 1000)
				).padStart(2, '0');
		}

		updateTimer();
		setInterval(updateTimer, 1000);
	}

	function initAllCountdowns() {
		const blocks = document.querySelectorAll(
			'.wp-block-jaffrey-democrats-countdown'
		);
		blocks.forEach(initCountdown);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initAllCountdowns);
	} else {
		initAllCountdowns();
	}
})();
