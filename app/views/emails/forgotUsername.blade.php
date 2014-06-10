<body>
    <h3>Hello {{ $username }},</h3>
    <p>
        You have recently asked for your username at ESMS system. 
    </p>
    <p>
        Your username is: <b> {{ $username }} </b>
    </p>
    <p>
        You can login now on the following link 
    </p>
    {{ $link }} 
    <hr>
    
    ESMS Team
</body>