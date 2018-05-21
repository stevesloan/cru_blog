# Create Read Update - Blog - API

> Iversoft Technical Interview Assignment


## API Documentation

API is available at example.com/api/

### GET /users

Get all users and their details

### GET /users/{id}

List specific user details

### PUT /edit_user/{id}

Update user details

#### Optional Parameters
- user_roles_id (int)
- username (string)
- address (string)
- province (string)
- city (string)
- country (string)
- postal_code (string)

#### Required Parameter
- ```_method=PUT```

### GET /blog_posts

Get all blog posts

### GET /blog_posts/user/{id}

Get all blog posts from specified user

### GET /blog_posts/{id}

Get specific blog post

### POST /create_blog_post

Create a new blog post

#### Required Parameters
- author (int)
- title (string)
- content (string)



## Installation

```docker-compose up```

Visit [localhost:8080](localhost:8080)
