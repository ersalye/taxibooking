@extends("frontend.layouts.master")


@section("after-styles-end")
    <style>
        .error{
            color:red;
        }
        .message-success{
            color:#2795c1 !important;
        }
    </style>

@endsection


@section("content")

    <div class="content">
        <!---start-contact----->
        <div class="contact">
            <div class="wrap">
                <div class="section group">
                    <div class="col span_1_of_3">
                        <div class="contact_info">
                            <h3>Find Us Here</h3>
                            <div class="map">
                                <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
                            </div>
                        </div>
                        <div class="company_address">
                            <h3>Company Information :</h3>
                            <p>500 Lorem Ipsum Dolor Sit,</p>
                            <p>22-56-2-9 Sit Amet, Lorem,</p>
                            <p>USA</p>
                            <p>Phone:(00) 222 666 444</p>
                            <p>Fax: (000) 000 00 00 0</p>
                            <p>Email: <span>info@mycompany.com</span></p>
                            <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
                        </div>
                    </div>
                    <div class="col span_2_of_3">
                        @if(Session::has('success'))
                            <h3 class="message-success">{{ Session::get('success') }}</h3>
                        @else

                        <div class="contact-form">
                            <h3>Contact Us</h3>

                                {{ Form::open(['route' => 'admin.contact.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
                                {{Form::hidden("isFront",true)}}
                                <div>
                                    <span><label>NAME</label></span>
                                    <span>

                                        {{ Form::text('name', null, ['class' => 'textbox', 'placeholder' => 'Name']) }}
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    </span>
                                </div>
                                <div>
                                    <span><label>E-MAIL</label></span>
                                    <span>
                                        {{ Form::text('email', null, ['class' => 'textbox', 'placeholder' => 'Email address']) }}
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    </span>

                                </div>
                                <div>
                                    <span><label>MOBILE</label></span>
                                    <span>
                                         {{ Form::text('mobile', null, ['class' => 'textbox', 'placeholder' => 'Mobile phone']) }}
                                        <div class="error">{{ $errors->first('mobile') }}</div>
                                    </span>
                                </div>
                                <div>
                                    <span><label>SUBJECT</label></span>
                                    <span>
                                        <textarea name="subject" required> </textarea>
                                        <div class="error">{{ $errors->first('subject') }}</div>
                                    </span>
                                </div>
                                <div>
                                    <span><input type="submit" value="Submit"></span>
                                </div>
                               {{Form::close()}}

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!---End-contact----->
        <div class="bottom-grids">
            @include("frontend.includes.button-grid")
        </div>
    </div>

@endsection