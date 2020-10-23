  <?php
      if (isset($_POST['submit'])) {
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $service = $_POST['service'];
         $message = $_POST['message'];
      }

         $to = 'emailsendto@example.com';
         $subject = 'The subject';
         $body = 'The email body content';
         $headers = array('Content-Type: text/html; charset=UTF-8','From: My Site Name &lt;support@example.com');

         wp_mail( $to, $subject, $body, $headers );

      ?>