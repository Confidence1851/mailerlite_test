<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriberResource;
use App\Services\MailerLite\SubscriberService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailerLite\Exceptions\MailerLiteValidationException;
use Throwable;

class SubscriberController extends Controller
{
    private $subscriberService;
    public function __construct(SubscriberService $subscriberService)
    {
        $this->subscriberService = $subscriberService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($email = $request->edit)) {
            try {
                $response = $this->subscriberService->find($email);
                $data = $response["body"]["data"];
                $subscriber = (new SubscriberResource($data))->toArray($data);
            } catch (Throwable $e) {
                session()->flash("success_message", "This subscriber does not exist.");
            }
        }
        return view("subscriber.index", [
            "subscriber" => $subscriber ?? null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                "email" => "required|email",
                "name" => "required|string",
                "country" => "required|string",
            ]);

            $response = $this->subscriberService->create($data);
            return back()->with("success_message", "Subscriber created successfully");
        } catch (ValidationException $e) {
            throw $e;
        } catch (MailerLiteValidationException $e) {
            return back()->with("error_message", $e->getMessage());
        } catch (Throwable $e) {
            return back()->with("error_message", "An error occurred while procesing your request.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                "name" => "required|string",
                "country" => "required|string",
            ]);

            $response = $this->subscriberService->update($id, $data);
            return redirect()->route("subscribers.index")->with("success_message", "Subscriber updated successfully");
        } catch (ValidationException $e) {
            throw $e;
        } catch (MailerLiteValidationException $e) {
            return back()->with("error_message", $e->getMessage());
        } catch (Throwable $e) {
            return back()->with("error_message", "An error occurred while procesing your request.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $response = $this->subscriberService->delete($id);
            return response()->json("Subscriber deleted successfully", 200);
        } catch (MailerLiteValidationException $e) {
            return response()->json($e->getMessage(), 400);
        } catch (Throwable $e) {
            return response()->json("An error occurred while procesing your request.", 500);
        }
    }

    public function ajax(Request $request)
    {
        $query = [
            "limit" => $request->length,
            "search" => $request->search["value"] ?? null
        ];
        $response = $this->subscriberService->list($query);
        return response()->json([
            "draw" => $request->draw,
            "recordsTotal" => $this->subscriberService->getCount(),
            "recordsFiltered" => $response["body"]["meta"]["per_page"] ?? $request->length,
            "data" => SubscriberResource::collection($response["body"]["data"] ?? null)
        ]);
    }
}
