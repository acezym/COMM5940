from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
from flask_login import LoginManager, login_user, logout_user, login_required, UserMixin
import requests

@app.route("/map")
@login_required
def map():
    headers = {
        'Authorization': 'Bearer keyGHT4s0GhgAfOSe',
    }

    params = (
        ('view', 'Grid view'),
    )
    r = requests.get('https://api.airtable.com/v0/appFLsn4cd5MWKYFV/Birthplace?api_key=keyGHT4s0GhgAfOSe&view=Grid%20view', headers=headers, params=params)
    dict = r.json()
    dataset = []
    for i in dict['records']:
         dict = i['fields']
         dataset.append(dict)
    return render_template('map.html', entries = dataset)
