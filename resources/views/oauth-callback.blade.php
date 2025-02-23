<html>
<body style="font-family: Arial, sans-serif; text-align: center; margin-top: 50px;">
<script>
    window.opener.postMessage({ token: "{{ $token }}", user_role: "{{ $user_role }}" }, "*");
    window.close();
</script>
<p style="font-size: 18px; color: green;">Authentication successful. You can close this window.</p>
</body>
</html>
