<?php
/**
 * Created by PhpStorm.
 * User: dishank.shah
 * Date: 10/17/14
 * Time: 11:08 AM
 */

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
    //email, firstname, surname, phone, mobile, title, day, month, year, nationality'
    public $day;
    public $month;
    public $year;
    public $iagree;
    public $title;
    public $firstname;
    public $surname;
    public $phone;
    public $mobile;
    public $nationality;
    public $email;
    public $password;
    public $parent;
    public  $dateOfBirth;

    private $_identity;

    /* this function is for get the option for title in view page */
    public function getTitleOptions()
    {
        return array(
            'Mr'=>'Mr',
            'Mrs'=>'Mrs',
            'Miss'=>'Miss',
            'Ms'=>'Ms',
            'Dr'=>'Dr',
            'Prof'=>'Prof',
            'Sir'=>'Sir',

        );
    }
    /* this function is for get the option for Days in view page */
    public function getDayOptions()
    {
        return array(
            '01'=>'1',
            '02'=>'2',
            '03'=>'3',
            '04'=>'4',
            '05'=>'5',
            '06'=>'6',
            '07'=>'7',
            '08'=>'8',
            '09'=>'9',
            '10'=>'10',
            '11'=>'11',
            '12'=>'12',
            '13'=>'13',
            '14'=>'14',
            '15'=>'15',
            '16'=>'16',
            '17'=>'17',
            '18'=>'18',
            '19'=>'19',
            '20'=>'20',
            '21'=>'21',
            '22'=>'22',
            '23'=>'23',
            '24'=>'24',
            '25'=>'25',
            '26'=>'26',
            '27'=>'27',
            '28'=>'28',
            '29'=>'29',
            '30'=>'30',
            '31'=>'31',
        );
    }
    /* this function is for get the option for Month in view page */
    public function getMonthOptions()
    {
        return array(
            '01'=>'Jan',
            '02'=>'Feb',
            '03'=>'Mar',
            '04'=>'Apr',
            '05'=>'May',
            '06'=>'Jun',
            '07'=>'Jul',
            '08'=>'Aug',
            '09'=>'Sep',
            '10'=>'Oct',
            '11'=>'Nov',
            '12'=>'Dec',
        );
    }

    /* this function is for get the option for Year in view page */
    public function getYearOptions()
    {
        return array('2014'=>'2014','2013'=>'2013','2012'=>'2012','2011'=>'2011','2010'=>'2010','2009'=>'2009','2008'=>'2008','2007'=>'2007','2006'=>'2006','2005'=>'2005','2004'=>'2004','2003'=>'2003','2002'=>'2002','2001'=>'2001','2000'=>'2000','1999'=>'1999','1998'=>'1998','1997'=>'1997','1996'=>'1996',
            '1995'=>'1995','1994'=>'1994','1993'=>'1993','1992'=>'1992','1991'=>'1991','1990'=>'1990','1989'=>'1989',
            '1988'=>'1988','1987'=>'1987','1986'=>'1986','1985'=>'1985','1984'=>'1984','1983'=>'1983','1982'=>'1982','1981'=>'1981','1980'=>'1980',
            '1979'=>'1979','1978'=>'1978','1977'=>'1977','1976'=>'1976','1975'=>'1975','1974'=>'1974','1973'=>'1973','1972'=>'1972','1971'=>'1971','1970'=>'1970','1969'=>'1969',
            '1968'=>'1968','1967'=>'1967','1966'=>'1966','1965'=>'1965','1964'=>'1964','1963'=>'1963','1962'=>'1962','1961'=>'1961','1960'=>'1960',
            '1959'=>'1959','1958'=>'1958','1957'=>'1957','1956'=>'1956','1955'=>'1955','1954'=>'1954','1953'=>'1953','1952'=>'1952','1951'=>'1951','1950'=>'1950','1949'=>'1949',
            '1948'=>'1948','1947'=>'1947','1946'=>'1946','1945'=>'1945','1944'=>'1944','1943'=>'1943','1942'=>'1942','1941'=>'1941','1940'=>'1940',
            '1939'=>'1939','1938'=>'1938','1937'=>'1937','1936'=>'1936','1935'=>'1935','1934'=>'1934','1933'=>'1933','1932'=>'1932','1931'=>'1931',
            '1930'=>'1930','1929'=>'1929','1928'=>'1928','1927'=>'1927','1926'=>'1926','1925'=>'1925','1924'=>'1924','1923'=>'1923','1922'=>'1922','1921'=>'1921','1920'=>'1920',
            '1919'=>'1919','1918'=>'1918','1917'=>'1917','1916'=>'1916','1915'=>'1915','1914'=>'1914',
        );
    }

    /* this function is for get the option for nationallity in view page */
    public function getNationalOptions()
    {
        return array('United Kingdom'=>'United Kingdom','Italy'=>'Italy','Netherlands'=>'Netherlands','Spain'=>'Spain','Germany'=>'Germany','Czech Republic'=>'Czech Republic',
            'Poland'=>'Poland','Belgium'=>'Belgium','France'=>'France','Slovakia'=>'Slovakia','Russian Federation'=>'Russian Federation','Greece'=>'Greece','_'=>'--------------',
            'Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','Andorra'=>'Andorra','Angola'=>'Angola','Argentina'=>'Argentina','Armenia'=>'Armenia',
            'Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados',
            'Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia and Herzegovina'=>'Bosnia and Herzegovina',
            'Botswana'=>'Botswana','Brazil'=>'Brazil','Brunei Darussalam'=>'Brunei Darussalam','Bulgaria'=>'Bulgaria','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada',
            'Chile'=>'Chile','China'=>'China','Colombia'=>'Colombia','Costa Rica'=>'Costa Rica',"C么te d'Ivoire"=>"C么te d'Ivoire",'Croatia'=>'Croatia','Cuba'=>'Cuba','Cyprus'=>'Cyprus',
            'Czech Republic'=>'Czech Republic','Denmark'=>'Denmark','Dominican Republic'=>'Dominican Republic','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador',
            'Estonia'=>'Estonia','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Greece'=>'Greece',
            'Greenland'=>'Greenland','Grenada'=>'Grenada','Guam'=>'Guam','Guatemala'=>'Guatemala','Guyana'=>'Guyana','Haiti'=>'Haiti','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong',
            'Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan',
            'Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kiribati'=>'Kiribati','Korea, North'=>'Korea, North','Korea, South'=>'Korea, South','Kuwait'=>'Kuwait','Lao'=>'Lao',
            'Latvia'=>'Latvia','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macao'=>'Macao','Macedonia'=>'Macedonia','Malaysia'=>'Malaysia','Maldives'=>'Maldives',
            'Malta'=>'Malta','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mexico'=>'Mexico','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia',
            'Montenegro'=>'Montenegro','Morocco'=>'Morocco','Nepal'=>'Nepal','Netherlands'=>'Netherlands','New Zealand'=>'New Zealand','Nigeria'=>'Nigeria','Norway'=>'Norway',
            'Oman'=>'Oman','Pakistan'=>'Pakistan','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines',
            'Poland'=>'Poland','Portugal'=>'Portugal','Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Romania'=>'Romania','Russian Federation'=>'Russian Federation','Samoa'=>'Samoa',
            'Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Serbia'=>'Serbia','Singapore'=>'Singapore','Slovakia'=>'Slovakia','Slovenia'=>'Slovenia',
            'Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Swaziland'=>'Swaziland',
            'Sweden'=>'Sweden','Switzerland'=>'Switzerland','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Thailand'=>'Thailand','Trinidad and Tobago'=>'Trinidad and Tobago',
            'Turkey'=>'Turkey','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','Uruguay'=>'Uruguay',
            'Uzbekistan'=>'Uzbekistan','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe','Other'=>'Other',
        );
    }

    /**
     * Declares the validation rules.
     * The rules state that username, password & email are required,
     * and username & email needs to be unique.
     */


    public function rules()
    {
        return array(
            array('email, firstname, surname, password, phone, mobile, title, day, month, year, nationality', 'required'),
            array('email', 'length', 'max'=>100),
            array('email', 'email','message'=>"The email isn't correct"),
            array( 'iagree', 'compare', 'on'=>'register', 'compareValue' => true, 'message' => 'You must agree to the terms and conditions' ),
            array('title, firstname, surname, nationality', 'length', 'max'=>50),
            array('phone, mobile, title', 'length', 'max'=>15),
            array('phone, mobile, parent','numerical','integerOnly'=>true),
            array('phone, mobile','length', 'min'=>10),
            array('iagree', 'required', 'requiredValue' => 1, 'message' => 'You should accept term to use our service'),
            array('day, month, year, iagree', 'safe'),
        );
    }


    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'email' => 'Email',
            'password' => 'Password',
            'firstname' => 'Firstname',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'title' => 'Title',
            'dateofbirth' => 'Dateofbirth',
            'nationality' => 'Nationality',
            'id' => 'ID',
            'iagree' => 'I agree the',
        );
    }

    /* prepare the parameter for service call for registration */
    public function regiCall($id)
    {
        if($user = Users::model()->exists('email=:email',array('email'=>$this->email)))
        {
            $this->addError('email', 'This email address is already in the system, please login normally.');
            return;
        }

        $tokenStr = $_SERVER['REQUEST_TIME'].(rand (1, 30000));
        //------- save data in database
        $email=$this->email;
        $usermodel=new users;
        $usermodel->idparent = $id;
        $usermodel->lastname=$this->surname;
        $usermodel->firstname=$this->firstname;
        $usermodel->pass=md5($this->password);
        $usermodel->phones=$this->phone;
        $usermodel->mobile=$this->mobile;
        $usermodel->title=$this->title;
        $usermodel->email=$this->email;
        //$usermodel->name=$this->email;
        $usermodel->country=$this->nationality;
        $usermodel->dateOfBirth=$this->year.'-'.$this->month.'-'.$this->day;
        $usermodel->regtoken=$tokenStr;

        $lastname=$this->surname;
        //var_dump($usermodel); // save data for registration
        if($usermodel->save(false)){
            echo 'hii';
            //send mail for activate account
            $baseUrl = Yii::app()->getBaseUrl(true);
            $emailBody = "<a href='$baseUrl/site/activation?token=$tokenStr'>Click Here</a>";
            $message  = new YiiMailMessage;
            $message->view='reg_mailLayout';
            $params  = array('myMail1'=>$emailBody,'lastname'=>$lastname);
            $message->setBody($params, 'text/html');
            $message->subject = 'Tradeland - Account Activation';
            $message->addTo($email);
            $message->SetFrom(array(Yii::app()->params['adminEmail']=>'Tradeland'));
            if(Yii::app()->mail->send($message)){
                Yii::app()->controller->redirect(array('/congrats'));
                return true;
            } else {
                return false;
            }

        }
        /*  if($this->month == 'Feb'){
              if($this->day >28){
                  $this->addError('day','invalid Day');
                  return;
              }
          }*/
        /*
                $data = array(
                    'parent'=>$this->parent,
                    'email'=>$this->email,
                    'password'=>md5($this->password),
                    'surname'=>$this->surname,
                    'title'=>$this->title,
                    'firstname'=>$this->firstname,
                    'lastname'=>$this->surname,
                    'dateOfBirth'=>$this->year.'-'.$this->month.'-'.$this->day,
                    'phones'=>$this->phone,
                    'mobile'=>$this->mobile,
                    'country'=>$this->nationality,
                    'ActURL'=>ACTIVATION_URL.'?email='.$this->email.'&code='
                );

                $temp = number_format(microtime(true)*1000,0,'.','');
                $params = array("funct" => "newuser1","data"=>$data,'temp'=>$temp,'token'=>'');
                Yii::trace('Request: '.http_build_query($params));

                $response = Yii::app()->ServiceHelper->serviceCall($params);//make call for registration
                $usersData = json_decode($response);
                Yii::trace('Response: '.$response);

                if($usersData->err == null && count($usersData->data) != 0){
                    Yii::app()->controller->redirect(array('/congrats'));
                } else if($usersData->err != null){
                    $this->addError('error',$usersData->err);
                    return;
                }*/
    }
}
