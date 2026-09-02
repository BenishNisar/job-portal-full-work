<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>

<body style="margin:0; padding:0; background-color:#f5f7fa; font-family:'Poppins', sans-serif;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
        <!-- Header -->
        <tr>
            <td bgcolor="#283054" style="padding: 30px 20px; color: #fff; text-align: center;">
                <h2 style="margin:0; font-weight:600;">📩 New Contact Submission</h2>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 30px;">
                <p style="font-size:16px; margin-bottom:20px;">You have received a new contact message from your website:</p>

                <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">
                    <tr>
                        <td style="background:#f5f7fa;"><strong>Name:</strong></td>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <td style="background:#f5f7fa;"><strong>Email:</strong></td>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <td style="background:#f5f7fa;"><strong>Country:</strong></td>
                        <td>{{ $contact->country }}</td>
                    </tr>
                    <tr>
                        <td style="background:#f5f7fa;"><strong>Phone:</strong></td>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <td style="background:#f5f7fa;"><strong>Message:</strong></td>
                        <td>{{ $contact->message }}</td>
                    </tr>
                    <tr>
                        <td style="background:#f5f7fa;"><strong>Submission Time:</strong></td>
                        <td>{{ $contact->created_at->format('d M, Y h:i A') }}</td>
                    </tr>
                </table>

                <p style="margin-top:30px; font-size:14px; color:#777;">This is an automated notification generated from your website.</p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td bgcolor="#283054" style="padding: 15px 20px; text-align: center; color:#ccc; font-size:12px;">
                &copy; {{ date('Y') }} Your Company | All Rights Reserved
            </td>
        </tr>
    </table>
</body>

</html>
