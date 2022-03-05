<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="bannerTitle">Banner Title</label>
            <textarea name="banner_title" cols="5" rows="3" class="form-control" id="bannerTitle">{{ old('banner_title') ?? $setting['banner_title'] ?? null  }}</textarea>
            @if($errors->has('banner_title'))
                <div class="error">{{ $errors->first('banner_title') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bannerBody">Banner Body</label>
            <textarea name="banner_body" cols="5" rows="3" class="form-control" id="bannerBody">{{ old('banner_body') ?? $setting['banner_body'] ?? null  }}</textarea>
            @if($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="aboutTitle">About Us Title</label>
            <textarea name="about_us_title" cols="5" rows="3" class="form-control" id="aboutTitle">{{ old('about_us_title') ?? $setting['about_us_title'] ?? null  }}</textarea>
            @if($errors->has('about_us_title'))
                <div class="error">{{ $errors->first('about_us_title') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="aboutBody">About Us Body</label>
            <textarea name="about_us_body" cols="5" rows="3" class="form-control" id="aboutBody">{{ old('about_us_body') ?? $setting['about_us_body'] ?? null  }}</textarea>
            @if($errors->has('about_us_body'))
                <div class="error">{{ $errors->first('about_us_body') }}</div>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="serviceTitle">Service Title</label>
            <textarea name="service_title" cols="5" rows="3" class="form-control" id="serviceTitle">{{ old('service_title') ?? $setting['service_title'] ?? null  }}</textarea>
            @if($errors->has('service_title'))
                <div class="error">{{ $errors->first('service_title') }}</div>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="serviceBody">Service Body</label>
            <textarea name="service_body" cols="5" rows="3" class="form-control" id="serviceBody">{{ old('service_body') ?? $setting['service_body'] ?? null  }}</textarea>
            @if($errors->has('service_body'))
                <div class="error">{{ $errors->first('service_body') }}</div>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="featureTitle">Feature Title</label>
            <textarea name="feature_title" cols="5" rows="3" class="form-control" id="featureTitle">{{ old('feature_title') ?? $setting['feature_title'] ?? null  }}</textarea>
            @if($errors->has('feature_title'))
                <div class="error">{{ $errors->first('feature_title') }}</div>
            @endif
        </div>


    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="featureBody">Feature Body</label>
            <textarea name="feature_body" cols="5" rows="3" class="form-control" id="featureBody">{{ old('feature_body') ?? $setting['feature_body'] ?? null  }}</textarea>
            @if($errors->has('feature_body'))
                <div class="error">{{ $errors->first('feature_body') }}</div>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="testimonialTitle">Testimonial Title</label>
            <textarea name="testimonial_title" cols="5" rows="3" class="form-control" id="testimonialTitle">{{ old('testimonial_title') ?? $setting['testimonial_title'] ?? null  }}</textarea>
            @if($errors->has('testimonial_title'))
                <div class="error">{{ $errors->first('testimonial_title') }}</div>
            @endif
        </div>


    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="testimonialBody">Testimonial Body</label>
            <textarea name="testimonial_body" cols="5" rows="3" class="form-control" id="testimonialBody">{{ old('testimonial_body') ?? $setting['testimonial_body'] ?? null  }}</textarea>
            @if($errors->has('testimonial_body'))
                <div class="error">{{ $errors->first('testimonial_body') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="portfolioTitle">Portfolio Title</label>
            <textarea name="portfolio_title" cols="5" rows="3" class="form-control" id="portfolioTitle">{{ old('portfolio_title') ?? $setting['portfolio_title'] ?? null  }}</textarea>
            @if($errors->has('portfolio_title'))
                <div class="error">{{ $errors->first('portfolio_title') }}</div>
            @endif
        </div>


    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="portfolioBody">Portfolio Body</label>
            <textarea name="portfolio_body" cols="5" rows="3" class="form-control" id="portfolioBody">{{ old('portfolio_body') ?? $setting['portfolio_body'] ?? null  }}</textarea>
            @if($errors->has('portfolio_body'))
                <div class="error">{{ $errors->first('portfolio_body') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="faqTitle">FAQ Title</label>
            <textarea name="faq_title" cols="5" rows="3" class="form-control" id="faqTitle">{{ old('faq_title') ?? $setting['faq_title'] ?? null  }}</textarea>
            @if($errors->has('faq_title'))
                <div class="error">{{ $errors->first('faq_title') }}</div>
            @endif
        </div>


    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="faqBody">FAQ Body</label>
            <textarea name="faq_body" cols="5" rows="3" class="form-control" id="faqBody">{{ old('faq_body') ?? $setting['faq_body'] ?? null  }}</textarea>
            @if($errors->has('faq_body'))
                <div class="error">{{ $errors->first('faq_body') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="contactTitle">Contact Title</label>
            <textarea name="contact_title" cols="5" rows="3" class="form-control" id="contactTitle">{{ old('contact_title') ?? $setting['contact_title'] ?? null  }}</textarea>
            @if($errors->has('contact_title'))
                <div class="error">{{ $errors->first('contact_title') }}</div>
            @endif
        </div>


    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="contactBody">Contact Body</label>
            <textarea name="contact_body" cols="5" rows="3" class="form-control" id="contactBody">{{ old('contact_body') ?? $setting['contact_body'] ?? null  }}</textarea>
            @if($errors->has('contact_body'))
                <div class="error">{{ $errors->first('contact_body') }}</div>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
