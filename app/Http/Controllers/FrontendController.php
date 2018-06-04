<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Subscriber;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    private $client;
    private $username;
    private $password;
    private $senderID;

    public function __construct()
    {
        $this->client = new Client;
        $this->username = 'Myschoolwap';
        $this->password = 'Tonnd7713';
        $this->senderID = 'Myschoolwap';
    }

    public function subscriptionPage()
    {
        return view('subscribe');
    }

    public function requestSubscription(Request $request)
    {
        $name = $request->input('subscriber_name');
        $phone = $request->input('subscriber_phone');
        $message = "Dear {$name}, You have successfully submitted your number for 2018 WAEC UPDATES %0A%0A SIR REUBEN %0A www.myschoolwap.com %0A WhatsApp: 08105870805";

        try {
            if ($this->client->request('POST',
                'http://api.smartsmssolutions.com/smsapi.php?username='
                .$this->username.'&password='.$this->password.'&sender='.$this->senderID.'&recipient='
                .$phone.'&message='.$message)) {
                $subscriber = new Subscriber;
                $subscriber->name = $name;
                $subscriber->phone = $phone;
                $subscriber->save();
            }
            // return back()->with(['success' => 'Successful!','subscriber_name' => $name]);
            return redirect()->to('//myschoolwap.com');
        } catch (\Exception $e) {
            abort(404);
            return back();
        }
    }

    public function sendsms()
    {
        $data['subscribers'] = Subscriber::all();
        return view('send-sms', $data);
    }

    public function sendSMSUpdate(Request $request)
    {
        $validator = validator($request->all(), [
            'message' => 'required']);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'The message field cannot be blank!');
        } else {
            $subscriber = Subscriber::where('phone', $request->input('subscriber'))->first();

            $message = $request->input('message');
            $formattedMessage = str_replace("\r\n", "%0A", $message);

            try {
                $this->client->request('POST',
                    'http://api.smartsmssolutions.com/smsapi.php?username='
                    .$this->username.'&password='.$this->password.'&sender='.$this->senderID.'&recipient='
                    .$subscriber->phone.'&message='.$formattedMessage);

                return back()->with('success', 'Update sent to candidate successfully!');
            } catch (\Exception $e) {
                abort(404);
                return back()->with('error', 'An error occured. Try again.');
            }
        }
    }

    public function candidates()
    {
        $data['candidates'] = Candidate::paginate(30);
        return view('candidates', $data);
    }

    public function addNewCandidate(Request $request)
    {
        $validator = validator($request->all(), [
            'subjects' => 'required',
            'candidate_phone' => 'required|string',
            'candidate_name' => 'required|string']);

        $name = $request->input('candidate_name');
        $phone = $request->input('candidate_phone');
        $subjects = $request->input('subjects');

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please complete the form and submit again.');
        } else {
            $message = "Dear {$name}, You have been successfully added to our WAEC database, %0AYour subjects are: {$subjects} %0AExam Title: WAEC %0APhone: {$phone} %0A%0AFor more info/complaint, contact %0A SIR REUBEN %0A 08105870805 .";

            try {
                $this->client->request('POST',
                    'http://api.smartsmssolutions.com/smsapi.php?username='
                    .$this->username.'&password='.$this->password.'&sender='.$this->senderID.'&recipient='
                    .$phone.'&message='.$message);

                $candidate = new Candidate;
                $candidate->name = $name;
                $candidate->phone = $phone;
                $candidate->subjects = $subjects;
                $candidate->save();

                return back()->with('success', 'SMS has been sent to new candidate');
            } catch (\Exception $e) {
                abort(404);
                return back()->with('error', 'An error occured while adding candidate. Try again.');
            }
        }
    }

    public function sendExpo(Request $request)
    {
        $this->validate($request, ['message' => 'required']);

        $candidates = explode(',', $request->input('candidates'));
        $message = $request->input('message');
        $formattedMessage = str_replace("\r\n", "%0A", $message);
        $count = 0;

        while ($count < count($candidates)) {
            $this->client->request('POST',
                'http://api.smartsmssolutions.com/smsapi.php?username='
                .$this->username.'&password='.$this->password.'&sender='.$this->senderID.'&recipient='
                .$candidates[$count].'&message='.$formattedMessage);

            $count++;
        }

        return redirect()->back()->with('success', 'Expo sent successfully.');
    }

    public function examPage()
    {
        return view('exam-page');
    }

    public function checkSubscriptionStatus(Request $request)
    {
        $this->validate($request, ['phone' => 'required|string']);

        $candidate = Candidate::where('phone', $request->input('phone'))->first();

        if ($candidate) {
            return redirect()->back()->with([
                'candidate' => $candidate,
                'success' => 'You are in our WAEC candidates database! Find your details below'
            ]);
        } else {
            return back()->with('error', 'Unfortunately, Your record wasn\'t found in our database.');
        }
    }

    public function navigation()
    {
        return view('site-links');
    }
}
