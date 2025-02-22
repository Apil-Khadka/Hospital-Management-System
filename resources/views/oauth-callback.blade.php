<html>
<body style="font-family: Arial, sans-serif; text-align: center; margin-top: 50px;">
<script>
    // Send token to the opener window
    window.opener.postMessage({ token: "{{ $token }}" }, "*");
    // Optionally, close this popup window automatically
    window.close();
</script>
<p style="font-size: 18px; color: green;">Authentication successful. You can close this window.</p>
</body>
</html>
