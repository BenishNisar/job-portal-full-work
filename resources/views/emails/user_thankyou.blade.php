<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Thank you from Aziz Ismail & Co.</title>
  <!-- Preheader (hidden preview text) -->
  <meta name="x-apple-disable-message-reformatting">
  <style>
    /* Mobile tweaks (kept minimal for client support) */
    @media (max-width:600px){
      .container { width:100% !important; }
      .px-24 { padding-left:16px !important; padding-right:16px !important; }
      .py-32 { padding-top:20px !important; padding-bottom:20px !important; }
      .h1 { font-size:22px !important; line-height:1.3 !important; }
    }
    /* Dark mode friendly defaults (non-critical) */
    @media (prefers-color-scheme: dark){
      body, .bg-body { background:#0b0f14 !important; }
      .card { background:#1a2430 !important; color:#e8eef6 !important; }
      .muted { color:#9fb0c3 !important; }
      .btn { background:#0ea5a4 !important; }
    }
  </style>
</head>
<body style="margin:0;padding:0;background:#f5f7fb;" class="bg-body">
  <!-- Visually hidden preheader -->
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;">
    Thanks {{ $contact->name }} — we’ve received your message and will get back to you soon.
  </div>

  <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
      <td align="center" style="padding:32px 12px;">
        <!-- Container -->
        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" class="container card"
               style="width:600px;max-width:600px;background:#ffffff;border-radius:14px;overflow:hidden;
                      box-shadow:0 6px 24px rgba(16,24,40,.08);">
          <!-- Header / Brand -->
          <tr>
            <td align="center" style="background:#0f766e;padding:18px 20px;">
              <a href="{{ url('/') }}" style="text-decoration:none;color:#ffffff;">
                <img src="{{ asset('assets/images/logo/footer-logo2.png') }}" width="170" height="auto" alt="Aziz Ismail &amp; Co." style="display:block;border:0;">
              </a>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="px-24 py-32" style="padding:28px 24px 24px;">
              <!-- Badge -->
              <div style="text-align:center;margin-bottom:16px;">
                <span style="display:inline-block;width:56px;height:56px;line-height:56px;border-radius:50%;
                             background:#ecfdf5;color:#0f766e;font-size:28px;font-weight:700;">✓</span>
              </div>

              <h1 class="h1" style="margin:0 0 8px;font:600 24px/1.4 Arial,Helvetica,sans-serif;color:#101828;text-align:center;">
                Thank you, {{ $contact->name }}!
              </h1>
              <p style="margin:0 0 20px;color:#475467;font:400 15px/1.7 Arial,Helvetica,sans-serif;text-align:center;">
                We’ve received your message and one of our team members will contact you shortly.
                If anything looks off, just reply to this email.
              </p>

              <!-- Summary card -->
              <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                     style="margin:14px 0 8px;background:#f9fafb;border:1px solid #eef2f7;border-radius:10px;">
                <tr>
                  <td style="padding:16px 18px;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                      <tr>
                        <td style="padding:6px 0;width:32%;color:#667085;font:700 13px Arial;">Name</td>
                        <td style="padding:6px 0;color:#101828;font:400 14px Arial;">{{ $contact->name }}</td>
                      </tr>
                      <tr>
                        <td style="padding:6px 0;width:32%;color:#667085;font:700 13px Arial;">Email</td>
                        <td style="padding:6px 0;color:#101828;font:400 14px Arial;">
                          <a href="mailto:{{ $contact->email }}" style="color:#0f766e;text-decoration:none;">
                            {{ $contact->email }}
                          </a>
                        </td>
                      </tr>
                      @if(!empty($contact->phone))
                      <tr>
                        <td style="padding:6px 0;width:32%;color:#667085;font:700 13px Arial;">Phone</td>
                        <td style="padding:6px 0;color:#101828;font:400 14px Arial;">
                          <a href="tel:{{ preg_replace('/[^0-9+]/','',$contact->phone) }}" style="color:#0f766e;text-decoration:none;">
                            {{ $contact->phone }}
                          </a>
                        </td>
                      </tr>
                      @endif
                      @if(!empty($contact->country))
                      <tr>
                        <td style="padding:6px 0;width:32%;color:#667085;font:700 13px Arial;">Country</td>
                        <td style="padding:6px 0;color:#101828;font:400 14px Arial;">{{ $contact->country }}</td>
                      </tr>
                      @endif
                      @if(!empty($contact->message))
                      <tr>
                        <td style="padding:10px 0;width:32%;color:#667085;font:700 13px Arial;vertical-align:top;">Message</td>
                        <td style="padding:10px 0;color:#101828;font:400 14px Arial;white-space:pre-wrap;">
                          {{ $contact->message }}
                        </td>
                      </tr>
                      @endif
                      <tr>
                        <td style="padding-top:10px;width:32%;color:#667085;font:700 13px Arial;">Reference</td>
                        <td style="padding-top:10px;color:#101828;font:400 14px Arial;">#AIC-{{ str_pad($contact->id ?? 0, 6, '0', STR_PAD_LEFT) }}</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

              <!-- CTA button (bulletproof) -->
              <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:18px auto 4px;">
                <tr>
                  <td align="center" bgcolor="#0f766e" style="border-radius:8px;">
                    <a href="{{ url('/services') }}"
                       class="btn"
                       style="display:inline-block;padding:12px 22px;font:600 14px Arial,Helvetica,sans-serif;
                              color:#ffffff;text-decoration:none;border-radius:8px;background:#0f766e;">
                      Explore Our Services
                    </a>
                  </td>
                </tr>
              </table>

              <p class="muted" style="margin:12px 0 0;color:#667085;font:400 13px Arial;text-align:center;">
                Prefer WhatsApp? Chat with us here:
                <a href="https://wa.me/923177638152" style="color:#0f766e;text-decoration:none;">+92 317 763 8152</a>
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background:#fafafa;border-top:1px solid #eef2f7;padding:18px 24px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td style="color:#667085;font:400 12px/1.6 Arial,Helvetica,sans-serif;">
                    <strong>Aziz Ismail &amp; Co.</strong><br>
                    305, Frere Business Centre, Frere Road, Saddar, Karachi 75350 (Pakistan)<br>
                    <a href="tel:+922127729444" style="color:#0f766e;text-decoration:none;">+92 21 2772944</a> •
                    <a href="mailto:info@azizismail.com" style="color:#0f766e;text-decoration:none;">info@azizismail.com</a>
                  </td>
                  <td align="right" style="font:400 12px Arial;color:#667085;">
                    <a href="{{ url('/') }}" style="color:#0f766e;text-decoration:none;">Website</a> &nbsp;•&nbsp;
                    <a href="#" style="color:#0f766e;text-decoration:none;">Facebook</a> &nbsp;•&nbsp;
                    <a href="#" style="color:#0f766e;text-decoration:none;">LinkedIn</a>
                  </td>
                </tr>
              </table>
              <p class="muted" style="margin:12px 0 0;color:#98a2b3;font:400 12px Arial;">
                This is an automated confirmation. If you didn’t submit this request, please ignore this email.
              </p>
            </td>
          </tr>
        </table>
        <!-- /Container -->
      </td>
    </tr>
  </table>
</body>
</html>
