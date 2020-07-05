<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailController extends AbstractController
{
    /**
     * Send new Email
     *
     * @Route("/email", name="send_email", methods={"POST"})
     * @param Request $request
     * @param MailerInterface $mailer
     * @return JsonResponse
     * @throws TransportExceptionInterface
     */
    public function sendEmail(Request $request, MailerInterface $mailer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $start = $data['start'];
        $end = $data['end'];
        $title = $data['title'];
        $gender = $data['gender'];
        $email = $data['email'];

        if (empty($start) ||
            empty($end) ||
            empty($title) ||
            empty($gender) ||
            empty($email)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $dateTime = date_parse_from_format('Y.n.j H:i', $start);
        $day = $dateTime['day'];
        $month = $dateTime['month'];
        $year = $dateTime['year'];
        $hour = $dateTime['hour'];

        if($dateTime['minute'] === 0){
            $minute = '00';
        } else {
            $minute = $dateTime['minute'];
        }

        $name = explode(',', $title);

        $email = (new Email())
            ->from('hello@example.com')
            ->to($email)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Dein Termin bei Creative Coiffeur!')
            ->text('Sending emails is fun again!')
            ->html('<p> Hey ' . $name[1] .',</p>' .
                '<p> am ' . '<strong>' . $day . '.' . $month . '.' . $year . '</strong>' .' gegen ' . '<strong>' . $hour . ':' . $minute . '</strong>' . ' haben wir einen Termin.</p>' .
                '<p> Ich freu mich darauf. Bitte sage rechtzeitig den Termin ab falls du ihn nicht wahrnehmen kannst.</p>' .
                '<p> Bleib Gesund</p>' .
                '<p> Dein Creative Coiffeur</p>' .
                '<p> Sükrü Demir</p>' .
                '<br>' .
                '<br>' .
                '<p>Creative Coiffeur</p>' .
                '<p>Sükrü Demir</p>' .
                '<p>Viktoriastraße 2</p>' .
                '<p>48565 Steinfurt</p>' .
                '<p>Tel: 02 55 1 / 98 80 19 6</p>'
            );

        $mailer->send($email);

        return new JsonResponse(['status' => 'Email Sended!'], Response::HTTP_CREATED);
    }
}