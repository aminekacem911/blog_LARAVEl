@extends('layouts.app')
@section('content')
  <main class="main-container">
    <section class="section-container">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">  
                <div class="h-scroll">
                  <div class="row">
                    <div class="col-8 col-md-4">
                      <div class="cardbox">
                        <div class="cardbox-body">
                          <div class="clearfix mb-2">
                            <div class="float-right">
                              <small><em class="ml-2 ion-arrow-up-b"></em></small>
                            </div>
                          </div>
                          <div class="h3" data-counter="{{$count_users}}"></div>
                          <div class="text-center mt-3">
                            <div class="sparkline" id="sparkline1" data-bar-color="#42a5f5"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-8 col-md-4">
                      <div class="cardbox">
                        <div class="cardbox-body">
                          <div class="clearfix mb-2">
                            <div class="float-left">
                              <small>Posts</small>
                            </div>
                          </div>
                          <div class="h3" data-counter="{{$count_posts}}"></div>
                          <div class="text-center mt-3">
                            <div class="sparkline" id="sparkline2" data-bar-color="#42a5f5"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-8 col-md-4">
                      <div class="cardbox">
                        <div class="cardbox-body">
                          <div class="clearfix mb-2">
                            <div class="float-left">
                              <small>Comments</small>
                            </div>
                          </div>
                          <div class="h3" data-counter="{{$count_comments}}"></div>
                          <div class="text-center mt-3">
                            <div class="sparkline" id="sparkline3" data-bar-color="#42a5f5"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    </section>
  </main>
@endsection
   
