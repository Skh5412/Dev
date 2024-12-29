<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .success {
            color: green;
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            require 'PHPMailer/Exception.php';

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            $mail = new PHPMailer(true);
            try {
                // SMTP server configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'info@sketchhub.co.in'; // Your email address
                $mail->Password = 'your_password'; // Your email password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Email settings
                $mail->setFrom('info@sketchhub.co.in', 'Sketchhub'); // Sender email
                $mail->addAddress($email, $name); // Recipient email
                $mail->Subject = 'Thank you for contacting us!';
                $mail->Body = "Dear $name,\n\nThank you for reaching out to us. We have received the following message:\n\n$message\n\nWe will get back to you shortly.\n\nBest regards,\nSketchhub Team";

                $mail->send();
                echo "<p class='success'>Thank you, $name. A confirmation email has been sent to $email.</p>";
            } catch (Exception $e) {
                echo "<p class='error'>There was an error sending your email: {$mail->ErrorInfo}</p>";
            }
        }
        ?>
        <section id="contact">
            <h3>Let's <span style="font-weight: 300;">Talk</span></h3>
            <form method="post" action="">
                <div>
                    <input type="text" name="name" placeholder="What's your name" required style="width: 100%; margin-bottom: 10px; padding: 8px;">
                </div>
                <div>
                    <input type="email" name="email" placeholder="Your Email" required style="width: 100%; margin-bottom: 10px; padding: 8px;">
                </div>
                <div>
                    <textarea name="message" placeholder="Tell us about your project" required style="width: 100%; margin-bottom: 10px; padding: 8px;"></textarea>
                </div>
                <div>
                    <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: #fff; border: none; cursor: pointer;">Send Message</button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
