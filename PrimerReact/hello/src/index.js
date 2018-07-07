import React from 'react';
import ReactDOM from 'react-dom';
import firebase from 'firebase';
import './index.css';
import App from './App';
import registerServiceWorker from './registerServiceWorker';

firebase.initializeApp({
    apiKey: "AIzaSyCc0KR1LJD5T7A-OtIw4951_ab0iw8C5Qw",
    authDomain: "pseudogram-b70ff.firebaseapp.com",
    databaseURL: "https://pseudogram-b70ff.firebaseio.com",
    projectId: "pseudogram-b70ff",
    storageBucket: "pseudogram-b70ff.appspot.com",
    messagingSenderId: "953449957474"
})

ReactDOM.render(<App />, document.getElementById('root'));
registerServiceWorker();
