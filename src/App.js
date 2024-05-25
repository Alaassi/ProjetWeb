import React, { useState } from 'react';
import { BrowserRouter as Router, Route, Switch, Redirect } from 'react-router-dom';
import Login from 'src/components/Login';
import Signup from 'src/components/Signup';
import HomePage from 'src/components/HomePage';
import Write from 'src/components/Write';

const App = () => {
  const [user, setUser] = useState(null);

  return (
    <Router>
      <div>
        <Switch>
          <Route path="/login">
            {user ? <Redirect to="/home" /> : <Login setUser={setUser} />}
          </Route>
          <Route path="/signup">
            {user ? <Redirect to="/home" /> : <Signup />}
          </Route>
          <Route path="/home">
            {user ? <HomePage user={user} /> : <Redirect to="/login" />}
          </Route>
          <Route path="/write">
            {user ? <Write userName={user.username} /> : <Redirect to="/login" />}
          </Route>
          <Route path="/logout">
            {() => { setUser(null); return <Redirect to="/login" />; }}
          </Route>
          <Redirect from="/" to="/login" />
        </Switch>
      </div>
    </Router>
  );
};

export default App;
