{% extends 'base.html' %}

{% block title %} Dashboard | {% endblock %}

{% block content %}


  <section id="showcase-inner" class="py-5 text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h1 class="display-4">User Dashboard</h1>
          <p class="lead">Manage your BT Real Estate account</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <section id="bc" class="mt-3">
    <div class="container">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{% url 'listing:home' %}">Home</a>
          </li>
          <li class="breadcrumb-item active"> Dashboard</li>
        </ol>
      </nav>
    </div>

  <section id="dashboard" class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Welcome {{ request.user.username }}</h2>
          <p>Here are the property listings that you have inquired about</p>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Property</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

            {% for contact in contacts %}
              <tr>
                <td>{{ forloop.counter }}</td>
                <td>{{ contact.listing }}</td>
     

                <td>
                  <a class="btn btn-light" href="{% url 'listing:listing-detail' contact.listing_id %}">View Listing</a>
                </td>
              </tr>
            {% endfor %}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  {% endblock %}