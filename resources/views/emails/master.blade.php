@yield("email")

<p>Thank you</p>
<p style="color:red;"><i>This is a no reply email, please do not reply to this email. You may contact us at <a href='mailto:{{setting("contact.email")}}' target='_blank'>{{setting("contact.email")}}</a></i></p>