{% extends 'base.html' %}

{% block content %}

  <!-- Breadcrumb -->
  <section id="bc" class="mt-3">
    <div class="container">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{% url 'listing:home' %}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{% url 'listing:listings' %}">Listings</a>
          </li>
          <li class="breadcrumb-item active">{{ property.title }}</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Listing -->
  <section id="listing" class="py-4">
    <div class="container">
      <a href="{% url 'listing:listings' %}" class="btn btn-light mb-4">Back To Listings</a>
      <div class="row">
        <div class="col-md-9">
          <!-- Home Main Image -->
          <img src="{{ property.thumb_nail.url }}" alt="" class="img-main img-fluid mb-3">
          <!-- Thumbnails -->
          <div class="row mb-5 thumbs">
            {% if property.photo_1 %}
            <div class="col-md-2">
              <a href="{{ property.photo_1.url }}" data-lightbox="home-images">
                <img src="{{ property.photo_1.url }}" alt="" class="img-fluid">
              </a>
            </div>
            {% endif %}
            {% if property.photo_2 %}
            <div class="col-md-2">
              <a href="{{ property.photo_2.url }}" data-lightbox="home-images">
                <img src="{{ property.photo_2.url }}" alt="" class="img-fluid">
              </a>
            </div>
            {% endif %}
            {% if property.photo_3 %}
            <div class="col-md-2">
              <a href="{{ property.photo_3.url }}" data-lightbox="home-images">
                <img src="{{ property.photo_3.url }}" alt="" class="img-fluid">
              </a>
            </div>
            {% endif %}
            {% if property.photo_4 %}
            <div class="col-md-2">
              <a href="{{ property.photo_4.url }}" data-lightbox="home-images">
                <img src="{{ property.photo_4.url }}" alt="" class="img-fluid">
              </a>
            </div>
            {% endif %}
            {% if property.photo_5 %}
            <div class="col-md-2">
              <a href="{{ property.photo_5.url }}" data-lightbox="home-images">
                <img src="{{ property.photo_5.url }}" alt="" class="img-fluid">
              </a>
            </div>
            {% endif %}
            {% if property.photo_6 %}
            <div class="col-md-2">
              <a href="{{ property.photo_6.url }}" data-lightbox="home-images">
                <img src="{{ property.photo_6.url }}" alt="" class="img-fluid">
              </a>
            </div>
            {% endif %}

          </div>
          <!-- Fields -->
          <div class="row mb-5 fields">
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item text-secondary">
                  <i class="fas fa-money-bill-alt"></i> Asking Price:
                  <span class="float-right">${{ property.price }}</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-bed"></i> Bedrooms:
                  <span class="float-right">{{ property.bedrooms }}</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-bath"></i> Bathrooms:
                  <span class="float-right">{{ property.bathrooms }}</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-car"></i> Garage:
                  <span class="float-right">{{ property.garage }}
                  </span>
                </li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item text-secondary">
                  <i class="fas fa-th-large"></i> Square Feet:
                  <span class="float-right">{{ property.sqft }}</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-square"></i> Lot Size:
                  <span class="float-right">{{ property.lot_size }} Acres
                  </span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-calendar"></i> Listing Date:
                  <span class="float-right">{{ property.list_date }}</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-bed"></i> Realtor:
                  <span class="float-right">{{ property.realtor }}
                  </span>
                </li>


              </ul>
            </div>
          </div>

          <!-- Description -->
          <div class="row mb-5">
            <div class="col-md-12">
              {{ property.description }}
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mb-3">
            <img class="card-img-top" src="{{ property.realtor.photo.url }}" alt="Seller of the month">
            <div class="card-body">
              <h5 class="card-title">Property Realtor</h5>
              <h6 class="text-secondary">Kyle Brown</h6>
            </div>
          </div>
          <button class="btn-primary btn-block btn-lg" data-toggle="modal" data-target="#inquiryModal">Make An Inquiry</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Inquiry Modal -->
  <div class="modal fade" id="inquiryModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inquiryModalLabel">Make An Inquiry</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{% url 'contactapp:contact' %}" method="POST">
            {% csrf_token %}
              {% if user.is_authenticated %}
                <input type="hidden" name="user_id" value="{{ user.id }}">
              {% else %}
                <input type="hidden" name="user_id" value="0">
              {% endif %}
          
              <input type="hidden" name="listing_id" value="{{ property.id }}">
              <div class="form-group">
                <label for="property_name" class="col-form-label">Property:</label>
                <input type="text" name="listing" class="form-control" value="{{ property.title }}">
              </div>
              <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" name="name" class="form-control" {% if user.is_authenticated %} value="{{ user.get_full_name }}" {% endif %} required>
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="email" name="email" class="form-control" {% if user.is_authenticated %} value="{{ user.email }}" {% endif %} required>
              </div>
              <div class="form-group">
                <label for="phone" class="col-form-label">Phone:</label>
                <input type="text" name="phone" class="form-control">
              </div>
              <div class="form-group">
                <label for="message" class="col-form-label">Message:</label>
                <textarea name="message" class="form-control" required></textarea>
              </div>
              <hr>
              <input type="submit" value="Send" class="btn btn-block btn-secondary">
            </form>
        </div>
      </div>
    </div>
  </div>
{% endblock %}