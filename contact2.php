<?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $name = htmlspecialchars($_POST['name']);
                            $email = htmlspecialchars($_POST['email']);
                            $message = htmlspecialchars($_POST['message']);
                
                            $to = "admin@sketchhub.co.in";
                            $subject = "New Contact Form Submission";
                            $headers = "From: $email\r\n";
                            $headers .= "Reply-To: $email\r\n";
                            $body = "You have received a new message from your website contact form:\n\n";
                            $body .= "Name: $name\n";
                            $body .= "Email: $email\n";
                            $body .= "Message:\n$message\n";
                
                            if (mail($to, $subject, $body, $headers)) {
                                echo "<p class='success'>Thank you for your message. We will get back to you shortly.</p>";
                            } else {
                                echo "<p class='error'>Sorry, there was an issue sending your message. Please try again later.</p>";
                            }
                        }
?>