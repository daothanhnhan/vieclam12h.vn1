var key = 'AAAAQ9_Syno:APA91bFvMS8TotRsvqei0_9Vn4qyaCVkEb6uZ1aNWTG2LrlJU0oeaeM8o4mm0Dsw4D0v7CCXPVMovBQqQ1rE3m-g2xp1LbvsHEQXI4Dqq68kzDfQAuYIXp3YembU_eHipJZlEdVbNaSo';
var to = 'c2iQojLjFJ_HVU58vC6kJF:APA91bF8vgY9r0XVoBS1sYQmxPN5Zz5x8gA7ES8XoWAdcCkfRThrnbR5rsAds41cPxQSTja3mWFHhdO3SR9Swi_n5Wjl8d_4a3ti6j7J0NsWVnGRldPCO5Lal0Uz9lA2uwgjT3fHDHz7';
var notification = {
  'title': 'Portugal vs. Denmark',
  'body': '5 to 1',
  'icon': 'firebase-logo.png',
  'click_action': 'http://localhost:8081'
};

fetch('https://fcm.googleapis.com/fcm/send', {
  'method': 'POST',
  'headers': {
    'Authorization': 'key=' + key,
    'Content-Type': 'application/json'
  },
  'body': JSON.stringify({
    'data': {'notification' : notification},
    'to': to
  })
}).then(function(response) {
  console.log('thanh cong.');
  console.log(response);
}).catch(function(error) {
  console.error(error);
})