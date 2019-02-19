from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
import requests

app = Flask(__name__)
app.config["DEBUG"] = False

@app.route('/')
def index():
    return render_template('index.html', title='Yiming Pythonanywhere')

@app.route("/data")
def data():

    r1 = requests.get('https://api.airtable.com/v0/appFLsn4cd5MWKYFV/Win-Loss?api_key=keyGHT4s0GhgAfOSe')
    dict = r1.json()
    dataset1 = []
    for i in dict['records']:
            dict = i['fields']
            dataset1.append(dict)

    r2 = requests.get('https://api.airtable.com/v0/appFLsn4cd5MWKYFV/Achievements?api_key=keyGHT4s0GhgAfOSe')
    dict = r2.json()
    dataset2 = []
    for i in dict['records']:
            dict = i['fields']
            dataset2.append(dict)

    r3 = requests.get('https://api.airtable.com/v0/appFLsn4cd5MWKYFV/Grand%20Slams?api_key=keyGHT4s0GhgAfOSe')
    dict = r3.json()
    dataset3 = []
    for i in dict['records']:
            dict = i['fields']
            dataset3.append(dict)

    headers = {
        'Authorization': 'Bearer keyGHT4s0GhgAfOSe',
    }
    params = (
        ('view', 'Grid view'),
    )
    r4 = requests.get('https://api.airtable.com/v0/appFLsn4cd5MWKYFV/Achievements?api_key=keyGHT4s0GhgAfOSe', headers=headers, params=params)
    dict1 = r4.json()
    dict2 = {}
    dataset4 = []
    name_list = []
    prize_list = []
    wings_list=[]
    for i in dict1['records']:
         dict2 = i['fields']
         dataset4.append(dict2)
    for item in dataset4:
        name_list.append(item.get('Name'))
        prize_list.append(item.get('CPrize'))
        wings_list.append(item.get('WinGS'))

    return render_template('data.html', winloss=dataset1, achievement=dataset2, gsprople_list=dataset3, prizechart=zip(name_list,prize_list), wings_zip=zip(name_list,wings_list), title='Player Date')


@app.route("/calendar")
def calendar():
    r = requests.get('https://api.airtable.com/v0/appfgqMQ6au7WZV26/WTA_Calendar2019?api_key=keyGHT4s0GhgAfOSe')
    dict = r.json()
    dataset = []
    for i in dict['records']:
            dict = i['fields']
            dataset.append(dict)
    return render_template('calendar.html', entries=dataset, title='WTA Calendar')

@app.route("/user")
def user():
    headers = {
        'Authorization': 'Bearer keyGHT4s0GhgAfOSe',
    }

    params = (
        ('view', 'Grid view'),
    )

    r1 = requests.get('https://api.airtable.com/v0/appoV0NAlyurAsQK8/ref?api_key=keyGHT4s0GhgAfOSe', headers=headers, params=params)
    dict1 = r1.json()
    dict2 = {}
    dataset1 = []
    action_list = []
    ref_points_list = []
    for i in dict1['records']:
         dict2 = i['fields']
         dataset1.append(dict2)
    for item in dataset1:
        action_list.append(item.get('actions_name'))
        ref_points_list.append(item.get('ref_points'))

    r2 = requests.get('https://api.airtable.com/v0/appoV0NAlyurAsQK8/ref?api_key=keyGHT4s0GhgAfOSe', headers=headers, params=params)
    dict3 = r2.json()
    dict4 = {}
    dataset2 = []
    action_list2 = []
    ref_user_list = []
    for i in dict3['records']:
         dict4 = i['fields']
         dataset2.append(dict4)
    for item in dataset2:
        action_list2.append(item.get('actions_name'))
        ref_user_list.append(item.get('count_of_users'))

    r3 = requests.get('https://api.airtable.com/v0/appoV0NAlyurAsQK8/user_info?api_key=keyGHT4s0GhgAfOSe')
    dict = r3.json()
    dataset3 = []
    for i in dict['records']:
            dict = i['fields']
            dataset3.append(dict)
    return render_template('user_info.html', points = zip(action_list, ref_points_list), userinfos = zip(action_list2, ref_user_list), usertable=dataset3, title='Membership Information')
