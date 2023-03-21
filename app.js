	if (navigator.mediaDevices) {
		var audioURL;
		var constraints = { audio: true };
		var chunks = [];
		var blob = null;
		var clipName = "";
			navigator.mediaDevices.getUserMedia(constraints)
				.then(function (stream) {
					var mediaRecorder = new MediaRecorder(stream);
				$("#record").click(function () {
					stream.getAudioTracks().forEach(function(track) {
					track.enabled = true;
					});
					$("#preview").trigger("stop");
					chunks = [];
					mediaRecorder.start();
					$("#record").attr("disabled", true);
					$("#stop").attr("disabled", false);
				});

				$("#stop").click(function () {
					mediaRecorder.stop();
					stream.getAudioTracks().forEach(function(track) {
    track.enabled = false;
});
					$("#record").attr("disabled", false);
					$("#stop").attr("disabled", true);
				});

				mediaRecorder.onstop = function (e) {
					clipName = new Date().toISOString();
					blob = new Blob(chunks, { 'type': 'audio/ogg; codecs=opus' });
					chunks = [];
					var data = new FormData();
			 data.append('file', blob);

			 $.ajax({
					 url: "/upload.php",
					 type: 'POST',
					 data: data,
					 contentType: false,
					 processData: false,
					 success: function(data) {
							 // Sent to Server
					 }
			 });
					audioURL = URL.createObjectURL(blob);
					$("#preview").attr("src", audioURL);
}

				mediaRecorder.ondataavailable = function (e) {
					chunks.push(e.data);

				}
			})
			.catch(function (err) {
				alert('The following error occurred: ' + err);
			})
	}
