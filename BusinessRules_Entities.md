Google doc of this info: <br>
https://docs.google.com/document/d/1-aMqq7AHJXnX-yf_3Q2UD9NUM7-qWq43Mv4wUaRKUVY/edit?usp=sharing 

<h3> Business Rules: </h3>
<p>
A CANDIDATE may have zero or more JOB_HISTORIES entries <br>
A specific JOB_HISTORY belongs to one CANDIDATE <br>

One CANDIDATE can have several QUALIFICATIONS <br>
One QUALIFICATION can be earned by multiple CANDIDATES <br>

A CANDIDATE can take COURSES to earn QUALIFICATIONS <br>
A QUALIFICATION can be earned through a COURSE <br>

A COURSE belongs to one specific QUALIFICATION <br>
A QUALIFICATION may or may not have an associated COURSE available <br>
A QUALIFICATION may need more than one COURSE to be earned <br>

A COURSE may have one or more prerequisite QUALIFICATIONS <br>
A QUALIFICATION may be a prerequisite for one or more COURSES <br>

A COURSE can have zero or more associated training SESSIONS <br>
A training SESSION teaches one COURSE <br>
A COURSE is taught through one training SESSION <br>

A training SESSION can be attended by zero or more CANDIDATES <br>
A CANDIDATE can attend many training SESSIONS <br>

A COMPANY can request many CANDIDATES <br>
A CANDIDATE can be requested by many COMPANIES <br>

A COMPANY can create OPENINGS <br>
An OPENING is belongs to one COMPANY <br>

An OPENING has one or more required QUALIFICATIONS <br>
A QUALIFICATION may be required by an OPENING <br>

An OPENING can be filled by many CANDIDATES <br>
A CANDIDATE can fill many OPENINGS <br>
</p>




---

<h3> Entities & Attributes: </h3>
<p>
CANDIDATE <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_fname <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_lname <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_phone <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_email <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_addr <br>

QUALIFICATION <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;qual_code <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;qual_desc <br>

CANDIDATE_QUALIFICATIONS	<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_id <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;qual_code	<br>

JOB_HISTORY <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;job_history_id <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;placement_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;start_dt <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;end_dt <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;total_hours <br>

COMPANY <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;company_id <br> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;company_name <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;company_addr <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;company_email <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;company_phone <br>

OPENING <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;opening_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;company_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;num_of_positions <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;start_dt <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;end_dt <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hourly_pay <br>

PLACEMENT <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;placement_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;opening_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;candidate_id <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;total_hours  <br>

OPENING_QUALIFICATIONS <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;opening_id <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;qual_code<br>

COURSE<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;course_id<br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;course_name<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;qualification_code<br>
?&nbsp;&nbsp;&nbsp;&nbsp;qulification_prereq_code	 &nbsp;&nbsp;&nbsp;(Also a M:N relationship?)<br>

SESSION<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;session_id<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;course_id<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;start_time <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;end_time <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;session_fee <br>
?&nbsp;&nbsp;&nbsp;&nbsp;candidate_id 	&nbsp;&nbsp;&nbsp;&nbsp;(might need a SESSION_CANDIDATES entity since a candidate can attend many sessions and a session can be attended by many candidates. This leads to a M:N relationship.)<br>
</p>

---

<h3> Relationships:</h3>
